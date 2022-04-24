<!-- Single Courses Start -->
<div class="single-courses bg-white my-3">
    <div class="row">
        <div class="col-5">
            <div class="courses-images h-100">
                <a href="/{{$batch->short_code}}" class="w-100 radius">
                    <img class="img-cover" src="{{json_decode($batch->images)[0] ?? asset('images/courses/courses-01.jpg')}}" alt="Courses">
                </a>
            </div>
        </div>
        <div class="col-7 p-0">
            <h5><a href="/courses/{{$course->slug}}">{{$batch->title}}</a></h5>

            <div class="courses-content pt-0">
                <div class="courses-price-review p-0 py-0 px-2 text-end">
                    <div class="courses-price">
                        <p class="old-parice mb-0 text-start" style="font-size: 13px">
                            {{request()->cookie('currency')}} {{number_format($batch->price)}}
                        </p>
                        <p class="sale-parice mt-0 text-start">
                            <span style="font-size: 12px;">{{request()->cookie('currency')}}</span> {{number_format($batch->discount_price)}}
                        </p>
                    </div>
                </div>
                <a href="{{$course->slug}}/{{$batch->short_code}}" class="btn btn-primary btn-hover-dark mt-2 w-100" style="font-size: 14px; line-height: 3.5;">View Batch</a>
            </div>

        </div>
    </div>

</div>
<!-- Single Courses End -->
