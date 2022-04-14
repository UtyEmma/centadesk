<?php

namespace App\Http\Controllers;

use App\Http\Traits\BatchActions;
use App\Http\Traits\CryptoActions;
use App\Http\Traits\EnrollmentActions;
use App\Http\Traits\TransactionActions;
use App\Http\Traits\WalletActions;
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
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class EnrollmentController extends Controller{
    use TransactionActions, BatchActions, EnrollmentActions, WalletActions, CryptoActions;

    public function initiate(Request $request, $batch_id){
        if(!$batch = Batch::find($batch_id))
                    return Response::redirectBack('error', "The requested batch does not exist");

        $user = $this->user();
        if($this->checkEnrollmentStatus($batch, $user))
                    return Response::redirectBack('error', 'You are already enrolled for this batch');

        $amount = $this->getPayableAmount($batch->unique_id);

        $transaction = $this->createTransaction([
            'amount' => $amount,
            'user_id' => $user->unique_id,
            'currency' => $user->currency,
            'type' => $request->payment
        ]);

        $redirect_url = env('MAIN_APP_URL')."/enroll/complete/$request->payment/$batch->unique_id";

        $transactions = [
            'crypto' => $this->payWithCrypto($transaction, $user, $redirect_url),
            'card' => $this->payWithCard($transaction, $user, $redirect_url),
            'wallet' => $this->payFromWallet($transaction, $batch, $user)
        ];

        return $transactions[$request->payment];
    }

    function payWithCard($transaction, $user, $redirect_url){
        $rave_link = $this->initializeFlutterwave($transaction, $user, $redirect_url);
        return Response::redirect($rave_link);
    }

    function payFromWallet($transaction, $batch, $user){
        $wallet = Wallet::where('user_id', $user->unique_id)->first();
        $mentor = User::where('unique_id', $batch->mentor_id)->first();
        $course = Courses::find($batch->course_id);

        if($transaction->amount > 0){
            if(!$this->handleWalletPayment($wallet, $transaction->amount)) return Response::redirectBack('error', 'You do not have sufficient funds in your wallet to complete this transaction. Please fund your wallet!');
        }

        $this->enrollUser($user, $mentor, $batch, $course, $transaction);

        $transaction->type = 'wallet';
        $transaction->status = 'completed';
        $transaction->save();

        // Send Enrollment Notification

        return Response::redirect("/profile/courses/$course->slug/$batch->short_code", 'success', 'You have successfully enrolled for this course');
    }


    public function complete(Request $request, $type, $batch_id){
        $transactions = [
            'crypto' => $this->verifyCryptoPayment($request, $batch_id),
            'card' => $this->verifyCardPayment($request, $batch_id)
        ];

        return $transactions[$type];
    }


}
