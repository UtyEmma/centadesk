<?php

namespace App\Http\Controllers;

use App\Http\Traits\CategoryActions;
use App\Http\Traits\CourseActions;
use App\Models\Category;
use Illuminate\Http\Request;

class AppController extends Controller {
    use CategoryActions, CourseActions;

    function index(Request $request){
        $categories = $this->getTopCategories();
        $courses = $this->getCoursesByCategories($categories, 6);
        return view('front.index', [
            'data' => $this->app_data($request),
            'categories' => $categories,
            'courses' => $courses
        ]);
    }

}
