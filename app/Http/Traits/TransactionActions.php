<?php

namespace App\Http\Traits;

use App\Library\Number;
use App\Library\Response;
use App\Library\Token;
use App\Models\Batch;
use App\Models\Courses;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Http;

trait TransactionActions {
    use EnrollmentActions;

    function createTransaction($data){
        $unique_id = Token::unique('transactions');
        $reference = Token::text(5, 'transactions', 'reference');
        $user = User::find($data['user_id']);

        $transaction = Transaction::create(array_merge($data, [
            'unique_id' => $unique_id,
            'reference' => $reference,
            'type' => $data['type']
        ]));

        return $transaction;
    }

    function handleReferrerPayout ($user, $amount){
        if ($user->referrer_id) {
            if($referrer = User::where('referrer_id', $user->referrer_id)->first()) {
                $bonus = env('REFERAL_BONUS');
                $wallet = $referrer->wallet;
                $wallet->referrals += Number::percentageValue($bonus, $amount);
                $wallet->save();
            }
        }
    }

    function initializeFlutterwave($transaction, $user, $url){
        $response = Http::withHeaders([
            'Authorization' => "Bearer ".env('RAVE_SECRET_KEY')
        ])->post(env('RAVE_API_BASE_URL').'/payments', [
            'tx_ref' => $transaction->reference,
            'amount' => $transaction->amount,
            'currency' => $transaction->currency,
            'redirect_url' => $url,
            'customer' => [
                'email' => $user->email,
                'name' => "$user->firstname $user->lastname"
            ],
            'customizations' => [
                'title' => env('APP_NAME')
            ]
        ]);

        if($response->ok() && $response->status() === 200) {
            $res = $response->collect();
            if($res['status'] === 'success') return $res['data']['link'];
        }

        return false;
    }

    public function verifyCardPayment($request, $batch_id){
        $tx_ref = $request->tx_ref;

        if(!$batch = Batch::find($batch_id)) return Response::redirect('/courses', 'error', "The batch you are trying to enroll in does not exist");
        if(!$course = Courses::find($batch->course_id)) return Response::redirect('/courses', 'error', "Course your a trying to enroll in does not exist");

        $enrollment_failed_link = "/courses/$course->slug/$batch->short_code";

        if($request->status === 'successful'){
            $transaction_id = $request->transaction_id;
            $transaction = $this->verifyTransaction($transaction_id, $tx_ref);
            $enrollment_success_link = "/learning/courses/$course->slug/$batch->short_code";

            if(!$transaction['status'])
                    return Response::redirect($enrollment_failed_link, 'error', $transaction['message']);

            $transaction = $transaction['transaction'];
            $user = User::find($transaction->user_id);
            $mentor = User::find($course->mentor_id);
            $this->handleReferrerPayout($user, $transaction->amount);

            $this->enrollUser($user, $mentor, $batch, $course, $transaction);

            return Response::redirect($enrollment_success_link, 'success', 'You have successfully enrolled for this course');
        }

        if($transaction = Transaction::where('reference', $tx_ref)->first()) $transaction->delete();

        return Response::redirect($enrollment_failed_link, 'error', "Your Payment attempt was failed");
    }

    function verifyTransaction($transaction_id, $tx_ref){
        $transaction = Transaction::where('reference', $tx_ref)->first();

        $response = Http::withHeaders([
            'Authorization' => env('RAVE_SECRET_KEY')
        ])->get("https://api.flutterwave.com/v3/transactions/".$transaction_id."/verify");

        if($response->ok() && $response->status() === 200) {
            $res = $response->json();

            $status = $res['data']['status'];
            $tx_ref = $res['data']['tx_ref'];

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

}
