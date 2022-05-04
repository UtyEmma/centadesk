<li>
    <div class="single-post">
        <div class="post-content p-0">
            <div class="row gx-2">
                <div class="col-3">
                    <x-image :image="$batch->images" />
                </div>

                <div class="col-9">
                    <h6 class="mb-0"><a href="./{{$course->slug}}/{{$batch->short_code}}">{{$batch->title}}</a></h6>
                    <small>{{Str::words($batch->excerpt, 7)}} <a class="text-primary" href="./{{$course->slug}}/{{$batch->short_code}}">Read More</a> </small>
                    <div class="mt-2">
                        <span class="date my-0"><i class="icofont-calendar"></i> {{$batch->startdate}} - {{$batch->enddate}} </span>
                    </div>
                    <div class="d-flex align-items-center mt-2 p-2 bg-light-primary radius">
                        <h5 class="my-0 text-primary fw-bold"><span style="font-size: 13px;">{{$batch->currency}}</span> {{number_format($batch->discount_price)}}</h5>
                        <small class="date my-0 ms-1 text-decoration-strikethrough" style="text-decoration: line-through; font-size: 12px;">
                            {{$batch->currency}} {{number_format($batch->price)}}
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>
