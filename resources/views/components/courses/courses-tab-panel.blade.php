<div class="tab-pane fade {{$active}}" id="{{$id}}">
    <!-- All Courses Wrapper Start -->
    <div class="courses-wrapper">
        <div class="row">
            @if (count($courses) > 0)
                @foreach ($courses as $key => $course)
                    <div class="col-lg-4 col-md-6">
                        <x-courses.single-course-card :course="$course" :mentor="$course->mentor" />
                    </div>
                @endforeach
            @else

            @endif
        </div>
    </div>
    <!-- All Courses Wrapper End -->

</div>
