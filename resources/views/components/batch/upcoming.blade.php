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
                <x-image :image="$course->images" />
            </div>

            <div class="col-9">
                <h5 class="mb-0"><a href="/learning/courses/{{$course->slug}}/{{$course->short_code}}">{{$course->title}}</a></h5>
                <h6><a href="/courses/{{$course->slug}}">{{$course->name}}</a></h6>
                <small>{{Str::words($course->excerpt, 7)}} <a class="text-primary" href="/learning/courses/{{$course->slug}}/{{$course->short_code}}">Read More</a> </small>
                <div class="mt-2">
                    <small class="date my-0"><i class="icofont-calendar fs-5"></i> {{$course->startdate}} - {{$course->enddate}} </small>
                </div>
                <div class="d-flex align-items-center mt-2 p-2 py-1 bg-light-primary radius">
                    <x-countdown.timer :id="$course->short_code" :date="$course->startdate">
                        <small class="">Countdown</small>
                        <h5 class="mb-0" id="{{$course->short_code}}"></h5>
                    </x-countdown.timer>
                </div>
            </div>
        </div>
    </div>
</div>
