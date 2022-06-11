<x-mentor-course-detail :course="$course" :mentor="$mentor" title="Course Batches">
    <x-page-title title="Mentor Dashboard - {{$course->name}}" />
    <div class="">
        <h5 class="mb-0">Available Sessions</h5>
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
