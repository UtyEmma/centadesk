<div>
    <ul class="nav nav-tabs mb-3 border-0 px-0">
        <li class="nav-item mr-3">
            <a class="nav-link p-0  {{request()->is("courses/$course->slug/$batch->short_code") ? 'text-primary font-weight-bold' : ''}}" href="{{"/courses/$course->slug/$batch->short_code"}}">Overview</a>
        </li>

        <li class="nav-item mr-3">
            <a class="nav-link p-0 {{request()->is("courses/$course->slug/$batch->short_code/students") ? 'text-primary font-weight-bold' : ''}}" href="{{"/courses/$course->slug/$batch->short_code/students"}}">Students</a>
        </li>

        <li class="nav-item mr-3">
            <a class="nav-link p-0 {{request()->is("courses/$course->slug/$batch->short_code/forum") ? 'text-primary font-weight-bold' : ''}}" href="{{"/courses/$course->slug/$batch->short_code/forum"}}">Forum</a>
        </li>

        <li class="nav-item mr-3">
            <a class="nav-link p-0 {{request()->is("courses/$course->slug/$batch->short_code/edit") ? 'text-primary font-weight-bold' : ''}}" href="{{"/courses/$course->slug/$batch->short_code/edit"}}">Edit</a>
        </li>
    </ul>

    <h3>{{$batch->title}}</h3>
    <h5><a href="/courses/{{$course->slug}}">{{$course->name}}</a></h5>

    <div class="card mb-3">
        <div class="card-body">
            {{$slot}}
        </div>
    </div>
</div>
