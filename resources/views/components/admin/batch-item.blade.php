<div class="card">
    <div class="row">
        <div class="col-4">
            <div class="position-relative overflow-hidden" style="width: 100%; height: 100%;">
                <img src="{{$batch->images}}" alt="" class="img-fluid position-absolute" style="position: absolute;
                object-fit: cover;
                object-position: center;
                overflow: hidden;
                min-height: 100%;" srcset="">
            </div>
        </div>

        <div class="col-8">
            <span class="badge badge-sm badge-primary mt-2">Status: <span class="text-uppercase">{{$batch->status}}</span></span>
            <div class="pr-2 py-2">
                <a class="f-6 font-weight-bold text-black" href="/courses/{{$course->slug}}/{{$batch->short_code}}">{{$batch->title}}</a>

                <div class="d-flex align-items-center mt-1">
                    <i class="mdi mdi-calendar mr-1 text-primary"></i>
                    <small>{{$batch->startdate}} - {{$batch->enddate}}</small>
                </div>

                <p class="p-1 px-2 bg-light mt-2 mb-0">
                    <span>{{$batch->total_students}}</span>
                    Students
                </p>
            </div>
        </div>
    </div>
</div>
