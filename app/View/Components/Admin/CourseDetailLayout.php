<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class CourseDetailLayout extends Component{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    private $course;
    public function __construct($course){
        $this->course = $course;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('admin.course.index', [
            'course' => $this->course
        ]);
    }
}
