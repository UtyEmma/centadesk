<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\CourseActions;
use App\Library\Response;
use App\Models\Courses;
use Illuminate\Http\Request;

class CourseController extends Controller{
    use CourseActions;

    function courses(){
        $courses = Courses::paginate(env('ADMIN_PAGINATION_COUNT'));
        $result = $this->getCoursesData($courses);

        return Response::view('admin.courses', [
            'courses' => $result
        ]);
    }

    function show($slug){
        $course = Courses::where('slug', $slug)->first();
        $result = $this->getCourseData($course);

        return Response::view('admin.course.info', [
            'course' => $result
        ]);
    }
}
