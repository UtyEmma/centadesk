<x-admin.course-detail-layout :course="$course">
    <div class="card mb-3">
        <div class="card-body">
            <div class="col-12">
                <h5>Sessions Under this Series</h5>

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
