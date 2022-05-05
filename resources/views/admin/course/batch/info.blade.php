<x-admin.course-detail-layout :course="$course">
    <div class="card mb-3">
        <div class="card-body">
            <ul class="nav nav-tabs mb-3 border-0 px-0">
                <li class="nav-item">
                    <a class="nav-link {{request()->is("courses/$course->slug/$batch->short_code") ? 'text-primary font-weight-bold' : ''}}" href="{{"/courses/$course->slug/$batch->short_code"}}">Overview</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{request()->is("courses/$course->slug/$batch->short_code/students") ? 'text-primary font-weight-bold' : ''}}" href="{{"/courses/$course->slug/$batch->short_code/students"}}">Students</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{request()->is("courses/$course->slug/$batch->short_code/forum") ? 'text-primary font-weight-bold' : ''}}" href="{{"/courses/$course->slug/$batch->short_code/forum"}}">Forum</a>
                </li>
            </ul>

            <div class="row">
                <div class="col-12 mb-2">
                    <span class="badge badge-primary">Status: <span class="text-uppercase">{{$batch->status}}</span></span>
                    <div>
                        <h6 class="mb-0 mt-2">Batch Link</h6>

                        <p>
                            <a href="{{env('MAIN_APP_URL')}}/{{$batch->short_code}}" target="_blank">{{env('MAIN_APP_URL')}}/{{$batch->short_code}}</a>
                        </p>
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{$batch->images}}" class="img-fluid" style="object-fit: cover;" />
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                </div>

                <div class="col-md-12 bg-light p-3">
                    <div class="row">
                        <div class="col-md-3 col-6">
                            <h6 class="mb-2">Batch Title</h6>
                            <p class="text-secondary">{{ $batch->title }}</p>
                        </div>

                        <div class="col-md-3 col-6">
                            <h6 class="mb-2">Batch Shortcode</h6>
                            <p class="text-secondary">{{ $batch->short_code }}</p>
                        </div>

                        <div class="col-md-3 col-6">
                            <h6 class="mb-2">Start Date</h6>
                            <p>{{$batch->startdate}}</p>
                        </div>

                        <div class="col-md-3 col-6">
                            <h6 class="mb-2">End Date</h6>
                            <p>{{$batch->enddate}}</p>
                        </div>

                        <div class="col-md-12">
                            <h6 class="mb-2">Batch Description</h6>
                            <p>
                                {{$batch->excerpt}}
                            </p>
                        </div>

                        <div class="col-md-12">
                            <h6 class="mb-2">Batch Objectives</h6>
                            <p>
                                <ul>
                                    @forelse (json_decode($batch->objectives) as $objective)
                                        <li>{{$objective}}</li>
                                    @empty

                                    @endforelse
                                </ul>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.course-detail-layout>
