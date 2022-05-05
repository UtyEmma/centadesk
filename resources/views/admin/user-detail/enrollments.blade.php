<x-admin.user-details :user="$user">
    <div class="stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Enrollment</h4>

            <div class="row gx-3">
                @forelse ($batches as $batch)
                    <div class="col-md-6">
                        <x-admin.batch-item :course="$batches" :batch="$batch" />
                    </div>
                @empty
                    <div class="col-md-12">
                        <h3>This user has not enrolled in any course yet!</h3>
                    </div>
                @endforelse
            </div>
          </div>
        </div>
      </div>
</x-admin.user-details>
