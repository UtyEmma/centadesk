<div class="single-courses mt-2">
    <div class="courses-images">
        <a href="/learning/courses/{{$course->slug}}/{{$course->short_code}}">
            <img src="{{json_decode($course->images)[0] ?? asset('images/courses/courses-01.jpg')}}" alt="Courses">
        </a>
    </div>
    <div class="courses-content pt-0">
        <h4 class="title mb-0"><a href="/learning/courses/{{$course->slug}}/{{$course->short_code}}">{{$course->name}}</a></h4>
        <h6 class="pt-0">
            <a class="pt-0" href="/learning/courses/{{$course->slug}}/{{$course->short_code}}">{{$course->title}}</a>
        </h6>
    </div>

    <div class="mt-3">
        <div class="row">
            <div class="col-md-6">
                <a href="">
                    <x-btn classes="btn-secondary btn-hover-primary w-100 px-2">
                        Details
                        <i class="icofont-arrow"></i>
                    </x-btn>
                </a>
            </div>
            <div class="col-md-6">
                <a href="">
                    <x-btn classes="btn-primary btn-hover-dark w-100 px-2">
                        Access Link
                        <i class="icofont-link"></i>
                    </x-btn>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Single Courses End -->
