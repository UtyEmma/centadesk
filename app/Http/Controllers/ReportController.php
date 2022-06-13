<?php

namespace App\Http\Controllers;

use App\Http\Requests\Reports\CreateReportRequest;
use App\Library\DateTime;
use App\Library\Notifications;
use App\Library\Response;
use App\Library\Token;
use App\Models\Admin;
use App\Models\Batch;
use App\Models\Report;
use App\Models\User;
use App\Notifications\Admin\BatchReportedAlert;
use App\Notifications\BatchReportedNotification;
use App\Notifications\Mentor\BatchReportedMentorNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ReportController extends Controller{


    function create(CreateReportRequest $request, $batch_id){
        if(!$batch = Batch::find($batch_id)) return Response::redirectBack('error', 'Batch Not Found');
        if(DateTime::dateDiff($batch->enddate, now()) > env('WITHDRAWAL_DAY_COUNT')) return Response::redirectBack('error', 'You cannot report this batch now! Because a maximum of '.env('WITHDRAWAL_DAY_COUNT').' days has been exceeded');

        $user = $this->user();
        $mentor = User::find($batch->mentor_id);
        $unique_id = Token::unique('reports');

        $admins = Admin::all();

        $report = Report::create([
            'unique_id' => $unique_id,
            'student_id' => $user->unique_id,
            'batch_id' => $batch_id,
            'message' => $request->report
        ]);

        $this->userNotification($user, $batch, $mentor);
        $this->mentorNotification($mentor, $batch);
        $this->adminNotification($batch);

        return Response::redirectBack('success', 'Report Submitted Successfully');
    }

    function userNotification($user, $session, $mentor){
        $message = [
            Notifications::parse('image', asset('images/email/kyc-success.png')),
            'greeting' => "Hi, $user->firstname",
            Notifications::parse('text', 'We have received your report on the <strong>'.$session->title.'</strong>, hosted by <strong>'.$mentor->firstname.' '.$mentor->lastname.'. Please be rest assured that we do not take your complaints lightly and will apply due deligence in investigating your complaint.'),
            Notifications::parse('text', 'To aid our investigation our team member may contact you for more information if neccessary. We therefore request that you offer your assistance in any way possible to help us resolve your complaint.'),
            Notifications::parse('text', "Thank you for working with us to create a better community at ".env('APP_NAME').'.'),
        ];

        $notification = Notifications::builder("Your complaint has been submitted successfully!", $message);
        Notifications::send($user, $notification, ['mail']);
    }

    function mentorNotification($user, $session){
        $message = [
            'greeting' => "Hi, $user->firstname",
            Notifications::parse('text', "We have received a new complaint on your session <strong>$session->title</strong> from a student."),
            Notifications::parse('text', 'We are obligated to review these reports and make decisions based on our findings in our review.'),
            Notifications::parse('text', 'To aid this process, our team member will be reaching out to you subsequently to determine the facts and circumstances of the complaint and appropriate action will be taken on that basis.'),
            Notifications::parse('text', 'Please we request that you help us resolve this complaint by being responsive.'),
            Notifications::parse('action', [
                'link' => route('mentor.courses'),
                'action' => "My Courses"
            ]),
            Notifications::parse('text', "We appreciate your co-operation and we look forward to a fair resolution for everyone."),
            Notifications::parse('text', "If you have any questions, please feel free to reach out to our support center at ".env('LIBRACLASS_EMAIL'))
        ];

        $notification = Notifications::builder("Your Session has a new Complaint!", $message);
        Notifications::send($user, $notification, ['mail']);
    }

    function adminNotification($session){
        $admins = Admin::all();
        $message = [
            Notifications::parse('text', 'There is a new complaint that requires a response on '.env('APP_NAME')),
            Notifications::parse('text', 'Please click the link below to view this complaint on your Admin Dashboard!.'),
            Notifications::parse('action', [
                'link' => route('admin.reports'),
                'action' => "View Reports"
            ])
        ];

        $notification = Notifications::builder("There is a new Complaint on ".env('APP_NAME'), $message);
        Notifications::send($admins, $notification, ['mail']);
    }



    function resolve(Request $request, $batch_id){
        if(!$batch = Batch::find($batch_id)) return Response::redirectBack('error', 'Batch Not Found');
        $user = $this->user();

        $report = Report::where([
            'batch_id' => $batch->unique_id,
            'student_id' => $user->unique_id
        ])->first();

        if(!$report) return Response::redirectBack('error', 'Report does not exist');

        $report->status = 'resolved';
        $report->save();

        $this->userResolveNotification($user);
        $this->mentorResolveNotification(User::find($batch->mentor_id));

        return Response::redirectBack('success', 'Your Report has been marked as resolved');
    }

    function userResolveNotification($user){
        $message = [
            Notifications::parse('image', asset('images/email/kyc-success.png')),
            'greeting' => "Hi, $user->firstname",
            Notifications::parse('text', 'Your Report has been marked as resolved by you! Thank you for trusting us.'),
            Notifications::parse('text', 'If you require any further assistance, feel free to contact our Support team by clicking the button below.'),
            Notifications::parse('action', [
                'link' => 'mailto:'.env('LIBRACLASS_EMAIL'),
                'action' => 'Contact Support'
            ]),
            Notifications::parse('text', "Thank you for working with us to create a better community at ".env('APP_NAME').'.'),
        ];

        $notification = Notifications::builder("Your complaint has been Resolved!", $message);
        Notifications::send($user, $notification, ['mail']);
    }

    function mentorResolveNotification($user){
        $message = [
            'greeting' => "Hi, $user->firstname",
            Notifications::parse('text', "The complaint against your Session has been marked as resolved."),
            Notifications::parse('text', 'You can proceed to engage with your account and create new Sessions as you please.'),
            Notifications::parse('text', "Thank you for working with us to create a better community at ".env('APP_NAME').'.')
        ];

        $notification = Notifications::builder("Complaint Resolved!", $message);
        Notifications::send($user, $notification, ['mail']);
    }
}
