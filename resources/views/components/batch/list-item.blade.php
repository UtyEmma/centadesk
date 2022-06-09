@php
    $startdate = Date::parse($batch->startdate);
    $enddate = Date::parse($batch->enddate);
@endphp

<li>
    <div class="single-post ">
        <div class="post-content p-0">
            <div class="row gx-2">
                <div class="col-3">
                    <div class="d-flex h-100 justify-content-center align-items-center bg-primary text-white radius border border-primary">
                        <div class="text-center">
                            <h5 class="my-0 text-white lh-1 fw-bold">{{$startdate->format('jS')}}</h5>
                            <h6 class="text-white my-0 ">{{$startdate->format('M')}}</h6>
                        </div>
                    </div>
                </div>

                <div class="col-9">
                    <h5 class="mb-0"><a href="/courses/{{$course->slug}}/{{$batch->short_code}}">{{$batch->title}}</a></h5>
                    <div class="mt-1">
                        <p class="date my-0">
                            <i class="icofont-calendar fs-6"></i>
                            <small style="font-size: 12px; font-weight: 500;">{{$startdate->format('M jS, g:i A')}}</small>
                        </p>
                    </div>
                    <small>{{Str::words($batch->excerpt, 7)}} <a class="text-primary" href="./{{$course->slug}}/{{$batch->short_code}}">Learn More</a> </small>
                    <div class="d-flex align-items-center mt-1 px-2 pb-1 bg-light-primary radius">
                        @include('components.batch.batch-price')
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>
