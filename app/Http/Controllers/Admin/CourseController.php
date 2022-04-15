<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\Response;
use App\Models\Courses;
use Illuminate\Http\Request;

class CourseController extends Controller{

    function courses(){
        $courses = Courses::all();
        return Response::view('admin.courses', [
            'courses' => $courses
        ]);
    }
}
