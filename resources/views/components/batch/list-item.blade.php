<li>
    <div class="single-post">
        <div class="post-content p-0">
            <div class="d-flex justify-content-between">
                <h5 class="title"><a href="./{{$course->slug}}/{{$batch->short_code}}">{{$batch->title}}</a></h5>
            </div>
            <p class="date mb-1 mt-0">{{$batch->description}}</p>
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p class="date my-0" style="font-weight: 500;">Begins</p>
                    <span class="date my-0"><i class="icofont-calendar"></i> {{$batch->startdate}}</span>
                </div>
                <x-btn classes="btn-primary btn-hover-dark lh-0">Enroll</x-btn>
            </div>
        </div>
    </div>
</li>
