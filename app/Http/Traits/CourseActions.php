<?php

namespace App\Http\Traits;

use App\Library\DateTime;
use App\Models\Batch;
use App\Models\Category;
use App\Models\Courses;
use App\Models\Enrollment;
use App\Models\ForumMessages;
use App\Models\ForumReplies;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Pluralizer;
use stdClass;
use Illuminate\Support\Str;

trait CourseActions {

    public function getCoursesData($courses){
        return $courses->map(function($course){
            return $this->getCourseData($course);
        });
    }

    public function getCourseData($course, $user = null){
        $category = Category::where('slug', $course->category)->first();
        $course->category = $category->name ?? 'Uncategorized';
        $course->course_reviews = Review::where('course_id', $course->unique_id)->get();
        $course->mentor = User::where('unique_id', $course->mentor_id)->first();
        $course->batches = Batch::where('course_id', $course->unique_id)->get();
        $course->excerpt = Str::words($course->desc, 50);
        $course->active_batch = Batch::find($course->active_batch);
        $course->no_batches = Pluralizer::plural('Batch', $course->total_batches);
        $course->no_reviews = Pluralizer::plural('Review', $course->reviews);

        if($user){
            $course->user_enrolled = !!Enrollment::where([
                'course_id' => $course->unique_id,
                'student_id' => $user->unique_id
            ])->first();
        }else{
            $course->user_enrolled =  false;
        }


        return $course;
    }

    public function fetchCourse ($request, $slug){
        $user = $this->user();
        $course = Courses::where('slug', $slug)->first();

        $enrollment = Enrollment::where([
            'student_id' => $user->unique_id,
            'course_id' => $course->unique_id
        ])->first();

        $forum_messages = ForumMessages::where('batch_id', $enrollment->batch_id)
                                ->join('users', 'users.unique_id', 'forum_messages.sender_id')
                                ->select('forum_messages.*', 'users.firstname', 'users.lastname', 'users.avatar')
                                ->get();

        $messages = array_map(function($message){
            $message['created_at'] = DateTime::getDateInterval($message['created_at']);
            return $message;
        }, $forum_messages->toArray());

        $mentor = User::find($enrollment->mentor_id);
        $batch = Batch::find($enrollment->batch_id);

        $batch->begins = DateTime::getDateInterval($batch->startdate);

        return [
            'batch' => $batch,
            'course' => $course,
            'enrollment' => $enrollment,
            'mentor' => $mentor,
            'forum' => $messages,
            'user' => $user
        ];
    }

    function singleCourse($course){
        $obj = new stdClass();
        $obj->mentor = User::find($course->mentor_id);
        $obj->batch = Batch::find($course->active_batch);
        $obj->reviews = $course->allReviews;
        return $obj;
    }

    function getCourseBySlug($slug, $mentor){
        return Courses::where([
            'mentor_id' => $mentor->unique_id,
            'slug' => $slug
        ])->first();
    }

    function getCoursesByCategories($categories, $limit = 0){
        $courses_collection = collect([]);
        $categories->map(function($category, $key) use ($limit, $courses_collection){
            $courses = Courses::where('category', $category->slug)->limit($limit)->get();
            $courses_collection->put($category->slug, $courses);
        });
        return $courses_collection;
    }
}
