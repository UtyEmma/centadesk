<?php

namespace App\Http\Traits;

use App\Library\Notifications;
use App\Library\Number;
use App\Library\Token;
use App\Models\Batch;
use App\Models\Enrollment;
use App\Models\Setting;
use App\Notifications\EnrollmentCompletedNotification;
use App\Notifications\NewEnrollmentNotification;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Notification;

trait EnrollmentActions {
    use WalletActions;

    function enrollUser($student, $mentor, $batch, $course, $transaction){
        $unique_id = Token::unique('enrollments');

        Enrollment::create([
            'unique_id' => $unique_id,
            'batch_id' => $batch->unique_id,
            'course_id' => $batch->course_id,
            'student_id' => $student->unique_id,
            'mentor_id' => $course->mentor_id,
            'transaction_id' => $transaction->unique_id
        ]);

        if($transaction->amount > 0){
            $charge = Setting::first()->charge ?? env('DEFAULT_CHARGE');
            $mentor_amount = Number::percentageDecrease($charge, $transaction['amount']);

            $mentor->earnings += $mentor_amount;
            $mentor->save();

            $this->updateMentorWallet($mentor, $mentor_amount);

            $course->total_students = $course->total_students + 1;
            $course->revenue = $course->revenue + $mentor_amount;
            $course->save();

            $batch->earnings = $batch->earnings + $mentor_amount;
        }

        $batch->total_students = $batch->total_students + 1;
        $batch->discount = $batch->total_students > $batch->signup_limit && $batch->signup_limit !== 0  ? 'none' : $batch->discount;
        $batch->save();

        $notification = [
            'subject' => [
                'student' => "Congratulations! Your enrollment was successfully completed",
                'mentor' => 'You have a new Enrollment on your Course'
            ],
            'course' => $course,
            'batch' => $batch,
            'mentor' => $mentor,
            'student' => $student
        ];

        try {
            Notification::send($student, new EnrollmentCompletedNotification($notification));
            Notification::send($student, new NewEnrollmentNotification($notification));
        } catch (\Throwable $th) {}
    }

    function studentNotification($user, $session, $course){
        $message = [
            Notifications::parse('image', asset('images/email/kyc-success.png')),
            'greeting' => "Hi, $user->firstname",
            Notifications::parse('text', "You have successfully enrolled for the $session->title of the $course->name course. You can now gain access to the class through your <a href='".env('MAIN_APP_URL')."/learning/$course->slug/$session->short_code"."'><strong>Learning Center</strong></a>."),
            Notifications::parse('text', "Your session is scheduled to begin at <strong>".Date::parse($session->startdate)->format("M jS, g:i A")."</strong>."),
            $session->class_link ?
            Notifications::parse('text', "Please click the link below to join the waiting group provided by your Mentor for this Session!") : '',
            $session->class_link ?
            Notifications::parse('action', [
                'link' => $session->class_link,
                'action' => "Join Waiting Group"
            ]) : '',
            Notifications::parse('text', "We are confident that you will find this session as amazing as your Mentor. If you have any complaints, please reach out to our support team ".env('LIBRACLASS_EMAIL')),
        ];

        $notification = Notifications::builder("Congratulations, your enrollment was Successful!", $message);
        Notifications::send($user, $notification, ['mail']);
    }

    function mentorNotification($user, $session, $course){
        $message = [
            Notifications::parse('image', asset('images/email/kyc-success.png')),
            'greeting' => "Hi, $user->firstname",
            Notifications::parse('text', "Congratulations, a new student has joined your session, $session->title."),
            Notifications::parse('text', 'To view more details about this and your session, please click the link below to visit your Mentor Dashboard!.'),
            Notifications::parse('action', [
                'link' => env('MAIN_APP_URL')."/me/courses/$course->slug/$session->short_code",
                'action' => "View on Dashboard"
            ]),
            Notifications::parse('text', "Remember to send a message to your student on the Session forum to let them know you are there!."),
        ];

        $notification = Notifications::builder("Congratulations, you have a new Enrollment", $message);
        Notifications::send($user, $notification, ['mail']);
    }

    function checkEnrollmentStatus($batch, $user){
        $enrollment = Enrollment::where([
            'batch_id' => $batch->unique_id,
            'student_id' => $user->unique_id
        ])->first();
        return $enrollment;
    }

}
