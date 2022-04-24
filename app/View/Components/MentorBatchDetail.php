<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MentorBatchDetail extends Component
{
    public $course;
    public $batch;
    public $mentor;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($course, $batch, $mentor){
        $this->course = $course;
        $this->batch = $batch;
        $this->mentor = $mentor;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('dashboard.course-details.batch.index');
    }
}
