<x-enrolled-course :course="$course" :batch="$batch" :messages="$forum" :mentor="$mentor" :user="$user" :enrollment="$enrollment" :report="$report">
    <x-page-title title="Enrolled - {{$batch->title}} of {{$course->name}}" />
    <div>
        <h5 class="tab-title">About this Session</h5>
        <p>
            {!! $batch->desc !!}
        </p>
    </div>

    <div class="overview">
        <div class="enroll-tab-title mt-4">
            <h5>What you will learn:</h5>
            <p>
                @if ($batch->objectives)
                    @forelse (json_decode($batch->objectives) as $objective)
                        <ul>
                            <li class="my-2"><i class="icofont-check text-primary fs-4"></i> {{$objective}}</li>
                        </ul>
                    @empty
                    @endforelse
                @endif
            </p>
        </div>
    </div>

    <x-courses.review-tab :reviews="$reviews" :batch="$batch" :can="$can_review" />
</x-enrolled-course>
