<!-- Single Courses Start -->
<div class="single-courses">
    <div class="row">
        <div class="col-md-4">
            <div class="courses-images h-100">
                <a href="/{{$batch->short_code}}" class="w-100 img-height radius">
                    <img class="img-cover" src="{{json_decode($batch->images)[0] ?? asset('images/courses/courses-01.jpg')}}" alt="Courses">
                </a>
            </div>
        </div>
        <div class="col-md-8 mt-3">
            <h5><a href="/courses/{{$course->slug}}">{{$batch->title}}</a></h5>
            {{-- <h6>{{$course->name}}</h6> --}}
            <div class="courses-meta">
                <small>
                    <i class="icofont-read-book"></i> {{$course->total_students}} Students
                </small>
            </div>
            <div class="courses-content p-0">
                <div class="courses-price-review p-0 py-2 ps-2 text-end">
                    <div class="courses-price">
                        <span class="old-parice" style="font-size: 12px">
                            {{request()->cookie('currency')}} {{number_format($batch->price)}}
                        </span>
                        <span class="sale-parice">
                            <span style="font-size: 12px;">{{request()->cookie('currency')}}</span> {{number_format($batch->discount_price)}}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="d-flex justify-content-end mt-3">
        <a href="{{$course->slug}}/{{$batch->short_code}}" class="btn btn-primary ms-3" style="font-size: 14px">View Batch</a>
    </div>
</div>
<!-- Single Courses End -->
