<script>
    $(() => {
        const date = moment("{{$course->startdate}}").format("YYYY/MM/DD");

        $("#{{$course->short_code}}-countdown").countdown(date, function(event) {
            $(this).text(
                event.strftime('%D days'));
            })
    })
</script>

<div class="single-post border p-3 radius">
    <div class="post-content p-0">
        <div class="row gx-2">
            <div class="col-3">
                <div class="d-flex h-100 justify-content-center align-items-center bg-primary text-white radius border border-primary">
                    <div class="text-center">
                        <h5 class="my-0 text-white lh-1 fw-bold">{{Date::parse($course->startdate)->format('jS')}}</h5>
                        <h6 class="text-white my-0 ">{{Date::parse($course->startdate)->format('M')}}</h6>
                    </div>
                </div>
            </div>

            <div class="col-9 pt-1">
                <h6 style="font-size: 20px; font-weight: 500;" class="mb-0">
                    <a href="/learning/courses/{{$course->slug}}/{{$course->short_code}}">
                        {{$course->title}}
                    </a>
                </h6>
                <h6 style="font-size: 15px; font-weight: 500;" class="mb-0">
                    <a href="/courses/{{$course->slug}}">{{$course->name}}</a>
                </h6>
                <div class="w-100 d-flex align-items-center justify-content-between">
                    <small class="date my-0">
                        <span style="font-size: 13px; font-weight: 500;">
                            {{Date::parse($course->startdate)->format('M jS, g:i A')}}
                        </span>
                    </small>

                    <x-batch.batch-price :batch="$course" />
                </div>

                <div class="d-flex align-items-center mt-1 p-2 py-1 pb-2 bg-light-primary radius">
                    <x-countdown.timer :id="$course->short_code.'item'" :date="$course->startdate">
                        <small class="text-muted" style="font-size: 13px; font-weight: 500;">Countdown</small>
                        <h5 class="mb-0" id="{{$course->short_code.'item'}}"></h5>
                    </x-countdown.timer>
                </div>
            </div>
        </div>
        <a href="/{{$course->short_code}}" class="btn btn-secondary border border-primary btn-custom btn-hover-primary w-100 mt-2">View Session</a>
    </div>
</div>
