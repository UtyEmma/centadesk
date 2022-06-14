<?php

namespace App\Http\Controllers;

use App\Http\Traits\BatchActions;
use App\Http\Traits\CryptoActions;
use App\Http\Traits\EnrollmentActions;
use App\Http\Traits\TransactionActions;
use App\Http\Traits\WalletActions;
use App\Library\Currency;
use App\Library\Notifications;
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
use Barryvdh\DomPDF\Facade\Pdf;
class EnrollmentController extends Controller{
    use TransactionActions, BatchActions, EnrollmentActions, WalletActions, CryptoActions;

    public function initiate(Request $request, $batch_id){
        $user = $this->user();

        if(!$batch = Batch::find($batch_id))
                    return Response::redirectBack('error', "The requested batch does not exist");

        if($this->checkEnrollmentStatus($batch, $user))
                    return Response::redirectBack('error', 'You are already enrolled for this batch');

        $mentor = User::where('unique_id', $batch->mentor_id)->first();
        $course = Courses::find($batch->course_id);
        $amount = $this->getPayableAmount($batch->unique_id);


        $transaction = $this->createTransaction([
            'amount' => Currency::convertUserCurrencyToDefault($amount),
            'user_id' => $user->unique_id,
            'currency' => Currency::user(),
            'type' => $request->payment
        ]);

        if($amount < 1){
            $transaction = $this->createTransaction([
                'amount' => Currency::convertUserCurrencyToDefault($amount),
                'user_id' => $user->unique_id,
                'currency' => Currency::user(),
                'type' => $request->payment
            ]);

            $this->enrollUser($user, $mentor, $batch, $course, $transaction);

            return Response::redirect("/learning/courses/$course->slug/$batch->short_code", 'success', 'You have successfully enrolled for this course');
        }

        $redirect_url = env('MAIN_APP_URL')."/enroll/complete/$request->payment/$batch->unique_id";

        // if($request->payment === 'crypto') return $this->payWithCrypto($transaction, $user, $redirect_url, $batch, $course);
        if($request->payment === 'card') return $this->payWithCard($transaction, $user, $redirect_url);
        if($request->payment === 'wallet') return $this->payFromWallet($transaction, $batch, $user);
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

        return Response::redirect("/learning/courses/$course->slug/$batch->short_code", 'success', 'You have successfully enrolled for this course');
    }


    public function complete(Request $request, $type, $batch_id){
        // if($type === 'crypto') return $this->verifyCryptoPayment($request, $batch_id);
        if($type === 'card') return $this->verifyCardPayment($request, $batch_id);
    }

    public function downloadCertificate($slug, $shortCode){
        if(!$batch = Batch::where('short_code', $shortCode)->first()) return Response::redirectBack('error', 'This batch does not exist');

        $user = $this->user();
        $course = Courses::find($batch->course_id);
        $mentor = User::find($course->mentor_id);

        if(!Enrollment::where([
            'batch_id' => $batch->unique_id,
            'student_id' => $user->unique_id
            ])->first()) return Response::redirectBack('error', "You are not enrolled for this batch");

        if(!$batch->isCompleted()) return Response::redirectBack('error', "You cannot download this certificate because the batch has not been completed");

        if(!$batch->certificates) return Response::redirectBack('error', 'There is no certificate for this batch');

        $data = [
            'batch' => $batch,
            'student' => $user,
            'course' => $course,
            'mentor' => $mentor
        ];

        $pdf = Pdf::setOptions(['dpi' => 150,])->setPaper('a4', 'landscape');
        $pdf->loadView('certificate.template', $data);
        $pdf->render();

        return $pdf->download("libraclass_cert.pdf");
    }

    function viewCertificate($slug, $shortCode){
        if(!$batch = Batch::where('short_code', $shortCode)->first()) return Response::redirectBack('error', 'This batch does not exist');
        $user = $this->user();
        $course = Courses::find($batch->course_id);
        $mentor = User::find($course->mentor_id);
        return view('certificate.template',[
            'batch' => $batch,
            'student' => $user,
            'course' => $course,
            'mentor' => $mentor
        ]);
    }


}
