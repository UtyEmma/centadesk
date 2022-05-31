<?php

namespace App\Http\Controllers;

use App\Http\Traits\CategoryActions;
use App\Http\Traits\CourseActions;
use App\Library\Response;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Testimonial;
use App\Services\BlogService;
use Illuminate\Http\Request;

class AppController extends Controller {
    use CategoryActions, CourseActions;

    function index(Request $request){
        $courses = $this->topCourses();
        $categories = $this->getTopCategories();
        $testimonials = Testimonial::all();

        $posts = Blog::where('status', true)->orderBy('date', 'desc');

        return Response::view('front.index', [
            'data' => $this->app_data($request),
            'courses' => $courses,
            'categories' => $categories,
            'testimonials' => $testimonials,
            'posts' => $posts->get()
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

    function faqs(){
        $mentors = Faq::where('type', 'mentor')->get();
        $students = Faq::where('type', 'student')->get();
        return Response::view('front.faqs', [
            'mentors' => $mentors,
            'students' => $students
        ]);
    }

    function disclaimer(){
        return Response::view('front.disclaimer');
    }

}
