<?php

namespace App\Http\Controllers;

use App\Library\Token;
use App\Models\Batch;
use App\Models\Courses;
use App\Models\Enrollment;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EnrollmentController extends Controller{

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
        $user = User::find($transaction->user_id);
        $unique_id = Token::unique('enrollments');


        if(!$transaction || $transaction->status !== 'completed'){
            return redirect("/classes/$course->slug")->with('error', 'Enrollment Failed');
        }

        Enrollment::create([
            'unique_id' => $unique_id,
            'batch_id' => $batch->unique_id,
            'course_id' => $batch->course_id,
            'student_id' => $user->unique_id,
            'mentor_id' => $course->mentor_id,
            'transaction_id' => $transaction->unique_id
        ]);

        $course->total_students += 1;
        $course->save();

        $batch->attendees += 1;
        $batch->save();

        $user->total_courses += 1;
        $user->total_batches += 1;
        $user->save();

        return response()->json([
            'course' => $course->slug
        ]);
    }
}
