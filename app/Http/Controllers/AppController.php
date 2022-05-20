<?php

namespace App\Http\Controllers;

use App\Http\Traits\CategoryActions;
use App\Http\Traits\CourseActions;
use App\Library\Response;
use App\Models\Category;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AppController extends Controller {
    use CategoryActions, CourseActions;

    function index(Request $request){
        $courses = $this->topCourses();
        $categories = $this->getTopCategories();
        $testimonials = Testimonial::all();

        return Response::view('front.index', [
            'data' => $this->app_data($request),
            'courses' => $courses,
            'categories' => $categories,
            'testimonials' => $testimonials
        ]);
    }

    function about(Request $request){
        return Response::view('front.about');
    }

    function contact(Request $request){
        return Response::view('front.contact');
    }

    function terms(Request $request){
        return Response::view('front.terms-of-service');
    }

    function privacyPolicy(Request $request){
        return Response::view('front.privacy-policy');
    }

    function faqs(Request $request){
        return Response::view('front.faqs');
    }

}
