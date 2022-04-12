<?php

namespace App\Http\Controllers;

use App\Http\Traits\TransactionActions;
use App\Library\Number;
use App\Library\Response;
use App\Library\Token;
use App\Models\Batch;
use App\Models\Courses;
use App\Models\Enrollment;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EnrollmentController extends Controller{
    use TransactionActions;

    public function initiate(Request $request){
        if(!$batch = Batch::where('short_code', $request->short_code)->first())
                            return Response::json(400, "The requested batch does not exist");

        $previousEnrollments = Enrollment::where([
            'user_id' => $request->user_id,
            'batch_id' => $batch->unique_id
        ])->get();

        if($previousEnrollments->isNotEmpty()){

        }
        $transaction = $this->createTransaction($request);
    }

    public function verify($reference){
        $response = Http::withHeaders([
            'Authorization' => env('RAVE_SECRET_KEY')
        ])->get("https://api.flutterwave.com/v3/transactions/".$reference."/verify");

        if($response->ok() && $response->status() === 200) {
            $res = $response->json();

            $status = $res['data']['status'];
            $tx_ref = $res['data']['tx_ref'];

            $transaction = Transaction::where('reference', $tx_ref)->first();

            if($status === 'successful'){
                $transaction->status = 'completed';
                $transaction->save();

                $user = User::find($transaction->user_id);
                $this->handleReferrerPayout($user, $transaction->amount);

                return [
                    'status' => true,
                    'transaction' => $transaction,
                    'code' => 200
                ];
            }

            return [
                'status' => false,
                'message' => 'Your Transaction was not Successful',
                'code' => 400
            ];
        }

        return [
            'status' => false,
            'message' => "We could not confirm your transaction status at the moment",
            'code' => 500
        ];
    }

    function enroll(Request $request, $batch_id, $reference){
        $batch = Batch::find($batch_id);
        $course = Courses::find($batch->course_id);
        $mentor = User::find($course->mentor_id);

        $transaction = $this->verify($reference);

        if(!$transaction['status']) return response()->json([
            'message' => $transaction['message']
        ], $transaction['code']);

        $transaction = $transaction['transaction'];
        $student = User::find($transaction->user_id);
        $unique_id = Token::unique('enrollments');

        if(!$transaction || $transaction->status !== 'completed'){
            return redirect("/classes/$course->slug")->with('error', 'Enrollment Failed');
        }

        Enrollment::create([
            'unique_id' => $unique_id,
            'batch_id' => $batch->unique_id,
            'course_id' => $batch->course_id,
            'student_id' => $student->unique_id,
            'mentor_id' => $course->mentor_id,
            'transaction_id' => $transaction->unique_id
        ]);

        $charge = Setting::first()->charge ?? env('DEFAULT_CHARGE');
        $mentor_amount = Number::percentageDecrease($charge, $transaction['amount']);


        $mentor->earnings += $mentor_amount;
        $mentor->save();

        $this->updateMentorWallet($mentor, $mentor_amount);

        $course->total_students += 1;
        $course->revenue += $mentor_amount;
        $course->save();

        $batch->total_students += 1;
        $course->earnings += $mentor_amount;
        $batch->save();

        return response()->json([
            'course' => $course->slug
        ]);
    }

    function updateMentorWallet($mentor, $amount){
        $wallet = Wallet::where('user_id', $mentor->unique_id)->first();
        $wallet->escrow += $amount;
        $wallet->balance += $amount;
        $wallet->save();
    }
}
