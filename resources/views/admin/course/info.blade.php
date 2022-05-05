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
                            <x-admin.batch-item :course="$course" :batch="$batch" />
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
