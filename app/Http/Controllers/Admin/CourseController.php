<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\CourseActions;
use App\Library\FileHandler;
use App\Library\Response;
use App\Library\Str;
use App\Models\Category;
use App\Models\Courses;
use Google\Service\Classroom\Course;
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

    function edit($id){
        $course = Courses::find($id);
        $categories = Category::where('status', true)->get();
        return Response::view('admin.course.edit', [
            'course' => $course,
            'categories' => $categories
        ]);
    }

    function update(Request $request, $slug){
        try {
            $course = Courses::where('slug', $slug)->first();

            $image = $request->hasFile('images') ? FileHandler::updateFile($request->file('images'), $course->images) : $course->images;

            $category = Category::where('slug', $request->category)->first();
            $slug = Str::slug($request->name, '-');

            $course->update([
                'name' => $request->name,
                'slug' => $slug,
                'desc' => $request->desc,
                'tags' => $request->tags,
                'video' => $request->video,
                'images' => $image,
                'category' => $category->name
            ]);

            return Response::redirectBack('success', "You course has been updated");
        } catch (\Throwable $th) {
            return Response::redirectBack('error', $th->getMessage());
        }
    }
}
