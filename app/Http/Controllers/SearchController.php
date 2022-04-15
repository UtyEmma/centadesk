<?php

namespace App\Http\Controllers;

use App\Http\Traits\AppActions;
use App\Http\Traits\CourseActions;
use App\Library\Response;
use App\Models\Courses;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller{
    use CourseActions, AppActions;

    function searchMentors(Request $request){
        $keyword = $request->keyword;
        $results = User::search($keyword)
                            ->where('role', 'mentor')
                            ->where('kyc_status', 'approved')->paginate(env('PAGINATION_COUNT'));

        $mentors = $results;
        return Response::redirect('/mentors', [
            'mentors' => $mentors
        ]);
    }

    function searchCourses(Request $request){
        $keyword = $request->keyword;
        $results = Courses::search($keyword)
                            ->where('status', 'published')->paginate(env('PAGINATION_COUNT'));

        $courses = $this->getCoursesData($results);

        return Response::view('front.courses', [
            'courses' => $courses,
            'data' => $this->app_data(),
            'type' => 'search'
        ]);

    }

}
