<?php

namespace App\Http\Controllers;

use App\Http\Traits\EnrollmentActions;
use App\Library\Response;
use App\Library\Token;
use App\Models\Batch;
use App\Models\Courses;
use App\Models\Transaction;
use App\Models\User;
use App\Notifications\CryptoPaymentComplete;
use App\Notifications\CryptoPaymentFailed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;

class CryptoPaymentController extends Controller{
    use EnrollmentActions;

    function initiate(Request $request){
        $user = $this->user();
        $url = env('COINBASE_API_URL').'/charges';

        $unique_id = Token::unique('transactions');
        $reference = Token::text(8);

        $transaction = Transaction::create([
            'unique_id' => $unique_id,
            'reference' => $reference,
            'amount' => $request->amount,

        ]);

        $response = Http::withHeaders([
            'X-CC-Api-Key' => env('COINBASE_API_KEY'),
            'Content-Type' => 'application/json',
            'X-CC-Version' => '2018-03-22'
        ])->post($url, [
            'name' => 'Libraclass Payment',
            'description' => 'This is the description',
            'pricing_type' => 'fixed_price',
            "local_price" => [
                "amount" => $request->amount,
                "currency" => $request->currency
            ],
            "metadata" => [
                "reference" => "id_1005",
                "customer_name" => "$user->firstname $user->lastname"
            ],
              "redirect_url" => env('MAIN_APP_URL')."/crypto/completed",
              "cancel_url" => env('MAIN_APP_URL')."/crypto/canceled"
        ]);

        if($response->status() !== 201) return Response::redirectBack('error', 'Could not initiate Crypto Payment transaction');
        $res = $response->json();
        $data = $res['data'];

        return redirect()->away($data['hosted_url']);
    }

    function updatePaymentStatus(Request $request){
        $event = $request->event;
        $reference = $event['data']['code'];
        $transaction = Transaction::where('reference', $reference)->first();
        $student = User::find($transaction->user_id);
        $batch = Batch::find($transaction->batch_id);
        $mentor = User::find($batch->user_id);
        $course = Courses::find($batch->course_id);

        if($event['type'] === 'charge:confirmed'){
            $transaction->status === 'completed';
            $transaction->save();
            $notification = [
                'subject' => "Your Payment has been completed successfully"
            ];
            Notification::send($student, new CryptoPaymentComplete($notification));
            $this->enrollUser($student, $mentor, $batch, $course, $transaction);
        }else if($event['type'] === 'charge:failed'){
            $transaction->status === 'incomplete';
            $transaction->save();
            $notification = [
                'subject' => "Your Payment has failed"
            ];
            Notification::send($student, new CryptoPaymentFailed($notification));
        }else if($event['type'] === 'charge:delayed'){
            $transaction->status = 'delayed';
            $transaction->save();
        }

        return Response::json(200);
    }

}
