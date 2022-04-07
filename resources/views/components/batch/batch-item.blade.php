<!-- Single Courses Start -->
<div class="single-courses">
    <div class="row">
        <div class="col-md-4 ">
            <div class="courses-images">
                <a href="/{{$batch->short_code}}" class="w-100 position-relative" style="height: 10px;">
                    <img class="img-cover" src="{{json_decode($batch->images)[0] ?? asset('images/courses/courses-01.jpg')}}" alt="Courses">
                </a>
            </div>
        </div>
        <div class="col-md-8">
            <h5><a href="/courses/{{$course->slug}}">{{$batch->title}}</a></h5>
            <h6>{{$course->name}}</h6>
            <div class="courses-meta">
                <span>
                    <i class="icofont-read-book"></i>{{$course->total_students}} Students
                </span>
            </div>
        </div>
    </div>

    <div class="courses-content">
        <div class="courses-price-review text-end">
            <div class="courses-price">
                <span class="old-parice" style="font-size: 13px">
                    {{request()->cookie('currency')}} {{number_format($batch->price)}}
                </span>
                <span class="sale-parice">
                    <span style="font-size: 13px;">{{request()->cookie('currency')}}</span> {{number_format($batch->discount_price)}}
                </span>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end mt-3">
        <button class="btn fs-6">View Details</button>
        <button class="btn btn-primary fs-6 ms-3">Enroll Now</button>
    </div>
    </div>
</div>
<!-- Single Courses End -->
