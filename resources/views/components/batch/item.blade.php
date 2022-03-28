<div class="card radius py-3 px-3 border mb-2">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <a href="/me/courses/{{$course->slug}}/{{$batch->short_code}}" class="fw-bold {{request()->url() === env('MAIN_APP_URL')."/me/courses/$course->slug/$batch->short_code" ? 'text-primary' : 'user'}}";
            " >{{$batch->title}}</a> <br/>
            <small>
                {{$batch->startdate}} - {{$batch->enddate}}
            </small>
        </div>

        <div>
            <button class="btn p-0"><i class="icofont-ui-copy"></i></button>
            <button class="btn p-0"><i class="icofont-share"></i></button>
        </div>
    </div>
</div>
