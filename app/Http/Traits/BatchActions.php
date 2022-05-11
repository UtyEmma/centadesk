<?php

namespace App\Http\Traits;

use App\Library\DateTime;
use App\Library\FileHandler;
use App\Library\Number;
use App\Library\Token;
use App\Models\Batch;
use App\Models\Courses;
use App\Models\Enrollment;
use App\Models\ForumMessages;
use App\Models\ForumReplies;
use App\Models\Report;
use App\Models\Setting;
use App\Models\User;
use App\Notifications\NewBatchPublishedNotification;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

trait BatchActions {
    use StudentActions, MentorActions, ReviewActions;

    function getBatchDetails($shortcode){
        if(!$batch = Batch::where('short_code', $shortcode)->first())
        throw new Exception("No Batch was found with the shortcode: '$shortcode'", 404);

        if(!$course = Courses::find($batch->course_id))
            throw new Exception("Invalid Request: The requested course does not exist", 404);

        if(!$mentor = User::find($course->mentor_id))
            throw new Exception("Could not get the Mentor for this Course", 404);

        $batch->remaining_slots = $batch->attendees - $batch->total_students;
        $batch->remaining_slots_percent = $batch->total_students * 100 / $batch->remaining_slots;

        if($batch->discount !== 'none'){
            $batch->discount_slots = $batch->signup_limit - $batch->total_students;
            $batch->discount_slots_percent = $batch->total_students * 100 / $batch->discount_slots;
        }

        return [
            'batch' => $batch,
            'course' => $course,
            'mentor' => $mentor
        ];
    }

    function mentorBatchDetails($shortcode, bool $getStudents = false, bool $getForum = false){
        $user = $this->user();

        if(!$batch = Batch::where(['short_code' => $shortcode])->first())
        throw new Exception("No Batch was found with the shortcode: '$shortcode'", 404);

        if(!$course = Batch::find($batch->unique_id)->course)
            throw new Exception("Invalid Request: The requested course does not exist", 404);

        if($course->mentor_id !== $user->unique_id)
            throw new Exception('Invalid Request: Batch was not created by user', 400);

        $students = $getStudents ? $this->students($batch->unique_id) : [];
        $forum = $getForum ? $this->forum($batch->unique_id) : [];
        $reviews = $this->getBatchReviews($batch);

        return [
            'batch' => $batch,
            'messages' => $forum,
            'students' => $students,
            'course' => $course,
            'mentor' => $user,
            'reviews' => $reviews
        ];
    }

    function batches($course){
        return $course->batches;
    }

    function applyDiscount($price, $discount, $type){
        if($type === 'fixed') return $discount;
        if($type === 'percent') return $price - ($discount / 100 * $price);
        if($type === 'none') return $price;
    }

    function students($batch_id){
        $students = DB::table('enrollments')
                            ->where('batch_id', $batch_id)
                            ->join('users', 'users.unique_id', 'enrollments.student_id')
                            ->select('users.*', 'enrollments.created_at')
                            ->get();

        $students->map(function($student){
            $student->enrolled_at = DateTime::parseTimestamp($student->created_at)->date;
            $this->parseStudentData($student);
        });

        return $students;
    }

    function forum($batch_id){
        $forum_messages = ForumMessages::where('batch_id', $batch_id)
                                        ->join('users', 'users.unique_id', 'forum_messages.sender_id')
                                        ->select('forum_messages.*', 'users.firstname', 'users.lastname', 'users.avatar')
                                        ->get();

        $messages = array_map(function($message){
                        $message['replies'] = ForumReplies::where('message_id', $message['unique_id'])
                                        ->join('users', 'users.unique_id', 'forum_replies.sender_id')
                                        ->select('forum_replies.*', 'users.firstname', 'users.lastname', 'users.avatar')
                                        ->get()->toArray();
                        $message['created_at'] = DateTime::getDateInterval($message['created_at']);
                        return $message;
                    }, $forum_messages->toArray());

        return $messages;
    }

    function getCourseBatches($course){
        return Batch::where([
            'course_id' => $course->unique_id
        ])->get();
    }

    function getUnpaidBatches($user){
        return Batch::where([
            'mentor_id' => $user->unique_id,
            'paid' => false
        ])->get();
    }

    function getBatchReports($batch){
        return Report::where('batch_id', $batch->unique_id)->where('status', 'pending')->get();
    }

    function setReportabilityStatus($batch){
        if($this->isPastWithdrawalDate($batch)) return false;
        if($this->isUpcoming($batch)) return false;
        return true;
    }

    function getEnrolledBatch($batch, $user){
        $enrollment = Enrollment::where([
            'student_id' => $user->unique_id,
            'batch_id' => $batch->unique_id
        ])->first();

        if(!$enrollment) throw new Exception("You are not enrolled for this batch");

        $forum_messages = ForumMessages::where('batch_id', $batch->unique_id)
                                ->join('users', 'users.unique_id', 'forum_messages.sender_id')
                                ->select('forum_messages.*', 'users.firstname', 'users.lastname', 'users.avatar')
                                ->get();

        $messages = $forum_messages->map(function($message){
            $message['created_at'] = DateTime::getDateInterval($message['created_at']);
            return $message;
        });

        $course = Courses::find($batch->course_id);

        $batch->begins = DateTime::getDateInterval($batch->startdate);
        $batch->reportable = $this->setReportabilityStatus($batch);

        $reviews = $this->getBatchReviews($batch);
        $can_review = $this->checkIfUserCanReview($user->unique_id, $batch);

        $mentor = User::where('unique_id', $enrollment->mentor_id)->first();


        $report = Report::where([
                    'student_id'=> $user->unique_id,
                    'batch_id' => $batch->unique_id])->first();

            return [
            'enrollment' => $enrollment,
            'mentor' => $mentor,
            'report' => $report,
            'reviews' => $reviews,
            'batch' => $batch,
            'can_review' => $can_review,
            'forum' => $messages,
            'user' => $user,
            'course' => $course
        ];
    }

    function getPayableAmount($batch_id){
        $batch = Batch::find($batch_id);
        if($batch->discount === 'none') return $batch->price;
        return $batch->discount_price;
    }

    function createBatch($request, $course){
        $batch_id = Token::unique('batches');

        $images = FileHandler::upload($request->file('images'));

        $user = $this->user();
        $short_code = strtolower(Token::text(5, 'batches', 'short_code'));

        if($request->discount === 'fixed'){
            $discount_price = $request->fixed;
        }else if($request->discount === 'percent'){
            $discount_price = Number::percentageDecrease($request->percent, $request->price);
        }

        $batch = Batch::create([
            'unique_id' => $batch_id,
            'course_id' => $course->unique_id,
            'mentor_id' => $user->unique_id,
            'duration' => $request->duration,
            'class_link' => $request->class_link,
            'access_link' => $request->access_link,
            'attendees' => $request->attendees,
            'price' => $request->price,
            'current' => true,
            'count' => 1,
            'video' => $request->video,
            'images' => $images,
            'startdate' => $request->startdate,
            'enddate' => $request->enddate,
            'title' => $request->title,
            'short_code' => $short_code,
            'discount' => $request->discount,
            'discount_price' => $discount_price,
            'fixed' => $request->fixed,
            'percent' => $request->percent,
            'time_limit' => $request->time_limit,
            'signup_limit' => $request->signup_limit,
            'currency' => $user->currency,
        ]);

        $course->update([
            'total_batches' => $course->total_batches + 1,
            'active_batch' => $batch->unique_id
        ]);

        $user->total_batches = $user->total_batches + 1;
        $user->save();

        $notification = [
            'subject' => 'You have successfully created a new batch',
            'batch' => $batch,
            'course' => $course
        ];

        Notification::send($user, new NewBatchPublishedNotification($notification));

        return $batch;
    }

    function isOngoing($batch){
        return Date::parse($batch->startdate)->lessThanOrEqualTo(Date::now()) && Date::parse($batch->enddate)->greaterThanOrEqualTo(Date::now());
    }

    function isUpcoming($batch){
        return Date::parse($batch->startdate)->greaterThan(Date::now());
    }

    function isPrevious($batch){
        return Date::parse($batch->enddate)->lessThan(Date::now());
    }

    function isPastWithdrawalDate($batch){
        $withdrawalDate = Date::parse($batch->enddate)->addDays(Setting::first()->withdrawal_day_count ?? env('WITHDRAWAL_DAY_COUNT'));
        return now()->greaterThan($withdrawalDate);
    }

}
