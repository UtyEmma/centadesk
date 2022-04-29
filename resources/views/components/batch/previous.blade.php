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

        <div class="courses-rating">
            <div class="rating-progress-bar">
                <div class="rating-line" style="width: 38%;"></div>
            </div>

            <div class="rating-meta">
                <span class="rating-star">
                        <span class="rating-bar" style="width: 80%;"></span>
                </span>
                <button class="">
                    <p>Leave a Review</p>
                </button>
            </div>
        </div>
    </div>

    <div class="mt-3">
        <a href="">
            <x-btn classes="btn-primary btn-hover-dark w-100">
                View Details
                <i class="icofont-arrow"></i>
            </x-btn>
        </a>
    </div>
</div>
<!-- Single Courses End -->
