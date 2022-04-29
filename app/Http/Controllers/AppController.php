<?php

namespace App\Http\Controllers;

use App\Http\Traits\CategoryActions;
use App\Http\Traits\CourseActions;
use App\Models\Category;
use Illuminate\Http\Request;

class AppController extends Controller {
    use CategoryActions, CourseActions;

    function index(Request $request){
        $courses = $this->topCourses();
        return view('front.index', [
            'data' => $this->app_data($request),
            'courses' => $courses
        ]);
    }

}
