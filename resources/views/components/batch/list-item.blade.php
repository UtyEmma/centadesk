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
                    {{-- <x-image :image="$batch->images" /> --}}
                </div>

                <div class="col-9">
                    <h5 class="mb-0"><a href="./{{$course->slug}}/{{$batch->short_code}}">{{$batch->title}}</a></h5>
                    {{-- <small>{{Str::words($batch->excerpt, 7)}} <a class="text-primary" href="./{{$course->slug}}/{{$batch->short_code}}">Read More</a> </small> --}}
                    <div class="mt-1">
                        <p class="date my-0">
                            <i class="icofont-calendar fs-6"></i> <span class="ml-2">{{$startdate->toDayDateTimeString()}}</span>
                        </p>
                    </div>
                    <div class="d-flex align-items-center mt-1 p-2 bg-light-primary radius">
                    @if ($batch->price > 0)
                        <h6 class="my-0 text-primary fw-bold"><span style="font-size: 13px;">{{request()->cookie('currency')}}</span> {{number_format($batch->discount_price)}}</h6>
                        <small class="date my-0 ms-1 text-decoration-strikethrough" style="text-decoration: line-through; font-size: 12px;">
                            {{request()->cookie('currency')}} {{number_format($batch->price)}}
                        </small>
                    @else
                        <p class="sale-parice text-start fw-bold text-primary" style="font-size: 12px;">
                            Free
                        </p>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>
