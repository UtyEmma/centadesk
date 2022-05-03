<li>
    <div class="single-post">
        <div class="post-content p-0">
            <div class="d-flex justify-content-between">
                <h4 class="title"><a href="./{{$course->slug}}/{{$batch->short_code}}">{{$batch->title}}</a></h4>
            </div>

            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p class="date my-0" style="font-weight: 500;">Begins</p>
                    <span class="date my-0"><i class="icofont-calendar"></i> {{$batch->startdate}}</span>
                </div>
                <div>
                    <p class="date my-0" style="font-weight: 500;">{{$batch->currency}} {{$batch->price}}</p>
                    <span class="date my-0">{{$batch->currency}} {{$batch->discount_price}}</span>
                </div>
            </div>
        </div>
    </div>
</li>
