<script>
    $(() => {
        const date = moment("{{$course->startdate}}").format("YYYY/MM/DD");

        $("#{{$course->short_code}}-countdown").countdown(date, function(event) {
            $(this).text(
                event.strftime('%D days'));
            })
    })
</script>


{{-- <div class="single-courses mt-2">
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
            <p>Begins in
                <span id="{{$course->short_code}}-countdown">
                    {{$course->begins}}
                </span>
            </p>

            <div class="rating-progress-bar">
                <div class="rating-line" style="width: 38%;"></div>
            </div>

            <div class="rating-meta">
                <span class="rating-star">
                        <span class="rating-bar" style="width: 80%;"></span>
                </span>
                <p>Your rating</p>
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
</div> --}}
<!-- Single Courses End -->
<div class="single-post border p-3 radius">
    <div class="post-content p-0">
        <div class="row gx-2">
            <div class="col-3">
                <div class="d-flex py-3 justify-content-center align-items-center bg-primary text-white radius border border-primary">
                    <div class="text-center">
                        <h5 class="my-0 text-white lh-1 fw-bold">{{Date::parse($course->startdate)->format('jS')}}</h5>
                        <h6 class="text-white my-0 ">{{Date::parse($course->startdate)->format('M')}}</h6>
                    </div>
                </div>
            </div>

            <div class="col-9">
                <h5 class="mb-0">
                    <a href="/learning/courses/{{$course->slug}}/{{$course->short_code}}">{{$course->title}}</a>
                </h5>
                <h6 class="mb-0">
                    <a href="/courses/{{$course->slug}}">{{$course->name}}</a>
                </h6>
                {{-- <small>{{Str::words($course->excerpt, 7)}} <a class="text-primary" href="/learning/courses/{{$course->slug}}/{{$course->short_code}}">Read More</a> </small> --}}

                <div class="w-100 d-flex align-items-center justify-content-between">
                    <small class="date my-0"><i class="icofont-calendar fs-6"></i>
                        <span style="font-size: 13px; font-weight: 500;">
                            {{Date::parse($course->startdate)->format('M jS, g:i A')}}
                            {{-- - {{Date::parse($course->enddate)->format('M jS, g:i A')}} --}}
                        </span>
                    </small>
                </div>

                {{-- <div class="d-flex align-items-center my-2 p-2 py-1 bg-light-primary radius">
                    <x-countdown.timer :id="$course->short_code.'item'" :date="$course->startdate">
                        <small class="">Countdown</small>
                        <h5 class="mb-0" id="{{$course->short_code.'item'}}"></h5>
                    </x-countdown.timer>
                </div> --}}

                <a href="" class="btn btn-secondary border border-primary btn-custom btn-hover-primary w-100 mt-2">View Session</a>
            </div>
        </div>
    </div>
</div>
