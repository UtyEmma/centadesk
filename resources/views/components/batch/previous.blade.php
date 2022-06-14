<div class="single-courses mt-2">
    <div class="courses-images">
        <a href="/learning/courses/{{$course->slug}}/{{$course->short_code}}">
            <img src="{{json_decode($course->images)[0] ?? asset('images/courses/courses-01.jpg')}}" alt="Courses">
        </a>
    </div>
    <div class="courses-content pt-3">
        <h5 class="pt-0 mb-1">
            <a class="py-0 my-0" href="/learning/courses/{{$course->slug}}/{{$course->short_code}}">{{$course->title}}</a>
        </h5>

        <h6 class="mb-0 mt-0 p-0"><a class="py-0 my-0" href="/learning/courses/{{$course->slug}}/{{$course->short_code}}">{{$course->name}}</a></h6>

        {{-- <div class="courses-rating"> --}}
            {{-- <div class="rating-progress-bar">
                <div class="rating-line" style="width: 38%;"></div>
            </div> --}}

            {{-- <div class="rating-meta">
                <span class="rating-star">
                        <span class="rating-bar" style="width: 80%;"></span>
                </span>
                <button class="btn btn-secondary btn-hover-primary border px-2 py-0 lh-0 border-primary btn-custom">
                    Leave a Review
                </button>
            </div>
        </div> --}}
    </div>

    <div class="mt-3">
        <a href="/learning/courses/{{$course->slug}}/{{$course->short_code}}" class="btn btn-custom btn-primary btn-hover-dark w-100">
            View Details
            <i class="icofont-arrow"></i>
        </a>
    </div>
</div>
<!-- Single Courses End -->
