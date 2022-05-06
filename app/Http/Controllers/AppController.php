<?php

namespace App\Http\Controllers;

use App\Http\Traits\CategoryActions;
use App\Http\Traits\CourseActions;
use App\Library\Response;
use App\Models\Category;
use Illuminate\Http\Request;

class AppController extends Controller {
    use CategoryActions, CourseActions;

    function index(Request $request){
        $courses = $this->topCourses();
        $categories = $this->getActiveCategories();

        return Response::view('front.index', [
            'data' => $this->app_data($request),
            'courses' => $courses,
            'categories' => $categories
        ]);
    }

    function about(Request $request){
        return Response::view('front.about');
    }

    function contact(Request $request){

    }

}
