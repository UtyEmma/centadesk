<x-admin.course-detail-layout :course="$course">
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-12 mb-3">
                    <span class="badge badge-primary">Status: <span class="text-uppercase">{{$course->status}}</span></span>
                </div>


                <div class="col-6 my-3">
                    <h6 class="mb-2">Course Image</h6>

                    <div>
                        <img src="{{$course->images}}" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-12 p-4 bg-light">
                    <div>
                        <h6 class="mb-2">Course Excerpt</h6>
                        <p class="text-secondary">{{ $course->excerpt }}</p>
                    </div>

                    <div>
                        <h6 class="mb-2">Course Description</h6>
                        <p class="text-secondary">{!! $course->desc !!}</p>
                    </div>

                    <div>
                        <h6 class="mb-2">Course Objectives</h6>
                        <p>
                            @if ($course->objectives)
                                @forelse (json_decode($course->objectives) as $objective)
                                    <ul>
                                        <li class="my-2"><i class="icofont-check text-primary fs-4"></i> {{$objective}}</li>
                                    </ul>
                                @empty

                                @endforelse
                            @endif
                        </p>
                    </div>
                </div>

                <div class="mt-3">
                    <h6 class="mb-2">Course Tags</h6>
                    @forelse (json_decode($course->tags) as $tag)
                        <span class="badge badge-warning text-capitalize ">{{ $tag->value }}</span>
                    @empty
                        <p></p>
                    @endforelse
                </div>
            </div>

            <div class="mt-4 col-12">
                <h5>Course Batches</h5>

                <div class="row gx-3">
                    @forelse ($course->batches as $batch)
                    <div class="col-md-6">
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
                                            <a class="f-6 font-weight-bold text-black" href="/courses/{{$course->unique_id}}/{{$batch->short_code}}">{{$batch->title}}</a>

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
                        </div>
                    @empty
                        <div class="col-md-12">
                            <h3>There are no batches for this course</h3>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-admin.course-detail-layout>
