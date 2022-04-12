<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EnrolledCourse extends Component {

    public $messages;
    public $course;
    public $batch;
    public $enrollment;
    public $mentor;
    public $user;
    public $report;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($messages, $course, $batch, $enrollment, $mentor, $user, $report){
        $this->messages = $messages;
        $this->course = $course;
        $this->batch = $batch;
        $this->enrollment = $enrollment;
        $this->mentor = $mentor;
        $this->user = $user;
        $this->report = $report;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('front.student.course.index');
    }
}
