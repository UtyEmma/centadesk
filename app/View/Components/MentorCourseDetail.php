<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MentorCourseDetail extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $course;
    public $batches;
    public $mentor;
    public $title;

    public function __construct($course, $batches, $mentor, $title){
        $this->course = $course;
        $this->batches = $batches;
        $this->mentor = $mentor;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('dashboard.course-details.index');
    }
}
