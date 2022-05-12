<x-mentor-course-detail :course="$course" :mentor="$mentor" title="Course Batches">
    <div class="overview-box mt-0">
        <div class="single-box mb-2">
            <h5 class="title">Enrolled Students</h5>
            <div class="count">
                {{$course->total_students}}
            </div>
            <p><span>58</span> This months</p>
        </div>
        <div class="single-box mb-2">
            <h5 class="title">Course Earnings</h5>
            <div class="count">
                {{$course->rating}}.0

                <span class="rating-star">
                        <span class="rating-bar" style="width: {{$course->rating * 20}}%;"></span>
                </span>
            </div>
            <p><span>58</span> This months</p>
        </div>
        <div class="single-box mb-2">
            <h5 class="title">Course Rating</h5>
            <div class="count">
                {{$course->rating}}.0

                <span class="rating-star">
                        <span class="rating-bar" style="width: {{$course->rating * 20}}%;"></span>
                </span>
            </div>
            <p><span>58</span> This months</p>
        </div>
    </div>

    <div class="admin-courses-tab d-flex align-items-center">
        <h4 class="mb-0">Course Batches</h4>

        <div class="courses-tab-wrapper">
            <div class="tab-btn py-0">
                <a href="{{$course->slug}}/batch/new" class="btn btn-primary btn-hover-dark">Create New Batch</a>
            </div>
        </div>
    </div>
    <!-- Admin Courses Tab End -->


    <div class="mt-4">
        <div class="row">
            @forelse ($batches as $batch)
                <div class="col-md-6">
                    <x-batch.mentor-item :course="$course" :batch="$batch" />
                </div>
            @empty
            @endforelse
        </div>
    </div>

</x-mentor-course-detail>
