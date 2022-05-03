<?php

namespace App\Http\Traits;

use App\Library\DateTime;
use App\Models\Batch;
use App\Models\Category;
use App\Models\Courses;
use App\Models\Enrollment;
use App\Models\ForumMessages;
use App\Models\ForumReplies;
use App\Models\Report;
use App\Models\Review;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Pluralizer;
use stdClass;
use Illuminate\Support\Str;

trait CourseActions {
    use MentorActions, BatchActions, ReviewActions;

    public function getCoursesData($courses){
        return $courses->map(function($course){
            return $this->getCourseData($course);
        });
    }

    public function getCourseData($course, $user = null){
        $category = Category::where('slug', $course->category)->first();
        $course->category = $category->name ?? 'Uncategorized';
        $course->course_reviews = $this->getCourseReviews($course);
        $course->mentor = User::where('unique_id', $course->mentor_id)->first();
        $course->batches = Batch::where('course_id', $course->unique_id)->get();
        $course->active_batch = Batch::find($course->active_batch);
        $course->no_batches = Pluralizer::plural('Batch', $course->total_batches);
        $course->no_reviews = Pluralizer::plural('Review', $course->reviews);

        if($user){
            $course->user_enrolled = !!Enrollment::where([
                'course_id' => $course->unique_id,
                'student_id' => $user->unique_id ?? null
            ])->first();
        }

        return $course;
    }

    public function fetchCourse ($request, $slug){
        $user = $this->user();
        $course = Courses::where('slug', $slug)->first();

        $mentor = User::find($course->mentor_id);
        $batches = $this->getCourseBatches($course);
        $reviews = $this->getCourseReviews($course);

        return [
            'batches' => $batches,
            'course' => $course,
            'mentor' => $mentor,
            'reviews' => $reviews,
            'user' => $user,
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
            $courses_data = $this->getCoursesData($courses);
            $courses_collection->put($category->slug, $courses_data);
        });

        return $courses_collection;
    }

    function getActiveCourses(){
        return Courses::where('status', 'published')->get();
    }

    function getSuggestedCourses(){
        $verifiedMentors = $this->verifiedMentorCourses();
        $bestselling = $this->getBestSellingCourses();

        $courses = $verifiedMentors->merge($bestselling);
        return $this->getCoursesData($courses);
    }

    function verifiedMentorCourses(){
        $mentors = $this->getVerifiedMentors(10);
        $courses = [];
        $mentors->map(function($mentor) use ($courses) {
            $course = Courses::where('mentor_id', $mentor->unique_id)->get();
            return  [ ...$courses, $course];
        });
        return collect($courses);
    }

    function getBestSellingCourses(){
        $courses = $this->getActiveCourses();
        return $courses->sortBy('total_students')->pull(10);
    }

    function topCourses(){
        $courses = $this->getActiveCourses()->sortBy('total_students');
        return $this->getCoursesData($courses);
    }


}
