<div class="border radius card-body">
    <div class="info-price text-start">
        <div class="d-flex align-items-center ">
            @include('components.batch.batch-price')
        </div>
    </div>
    @if ($batch->attendees > 0)
        <div class="mb-3">
            <small class="mb-0">{{$batch->remaining_slots}} out of {{$batch->attendees}} slots left</small>
            <div class="courses-rating">
                <div class="rating-progress-bar mt-1">
                    <div class="rating-line" style="width: {{$batch->remaining_slots_percent}}%;"></div>
                </div>
            </div>
        </div>
    @endif

    @if ($user = Auth::user())
        <x-payment-modal :user="$user" :batch="$batch" :wallet="$user->wallet" />
    @else
        <div class="info-btn w-100">
            <a href="/login?redirect={{request()->url()}}">
                <x-btn classes="btn-primary w-100 btn-hover-dark">
                    Login to Enroll
                </x-btn>
            </a>
        </div>
    @endif
</div>
