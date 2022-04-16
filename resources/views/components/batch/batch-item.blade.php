<!-- Single Courses Start -->
<div class="single-courses mt-0">
    <div class="row mb-3">
        <div class="col-5">
            <div class="courses-images">
                <a href="/{{$batch->short_code}}" class="w-100 radius">
                    <img class="img-cover" src="{{json_decode($batch->images)[0] ?? asset('images/courses/courses-01.jpg')}}" alt="Courses">
                </a>
            </div>
        </div>
        <div class="col-7 p-0">
            <h5><a href="/courses/{{$course->slug}}">{{$batch->title}}</a></h5>
            {{-- <h6>{{$course->name}}</h6> --}}
            <div class="courses-meta">
                <small>
                    <i class="icofont-read-book"></i> {{$course->total_students}} Students
                </small>
            </div>
        </div>
    </div>

    <div class="courses-content pt-2">
        <div class="courses-price-review p-0 py-2 px-2 text-end">
            <div class="courses-price">
                <p class="old-parice mb-0 text-start" style="font-size: 13px">
                    {{request()->cookie('currency')}} {{number_format($batch->price)}}
                </p>
                <p class="sale-parice mt-0 text-start">
                    <span style="font-size: 12px;">{{request()->cookie('currency')}}</span> {{number_format($batch->discount_price)}}
                </p>
            </div>
            <a href="{{$course->slug}}/{{$batch->short_code}}" class="btn btn-primary btn-hover-dark ms-3" style="font-size: 14px; line-height: 3.5;">View Batch</a>
        </div>
    </div>
</div>
<!-- Single Courses End -->
