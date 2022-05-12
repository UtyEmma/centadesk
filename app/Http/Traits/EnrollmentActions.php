<?php

namespace App\Http\Traits;

use App\Library\Number;
use App\Library\Token;
use App\Models\Enrollment;
use App\Models\Setting;
use App\Notifications\EnrollmentCompletedNotification;
use App\Notifications\NewEnrollmentNotification;
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

        $charge = Setting::first()->charge ?? env('DEFAULT_CHARGE');
        $mentor_amount = Number::percentageDecrease($charge, $transaction['amount']);

        $mentor->earnings += $mentor_amount;
        $mentor->save();

        $this->updateMentorWallet($mentor, $mentor_amount);

        $course->total_students += 1;
        $course->revenue += $mentor_amount;
        $course->save();

        $batch->total_students += 1;
        $batch->earnings += $mentor_amount;
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

    function checkEnrollmentStatus($batch, $user){
        $enrollment = Enrollment::where([
            'batch_id' => $batch->unique_id,
            'student_id' => $user->unique_id
        ])->first();
        return $enrollment;
    }

}
