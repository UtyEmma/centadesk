@if ($batch->price > 0)
    <div class="card border border-danger radius">
        <div class="card-header bg-danger text-white radius-top d-flex justify-content-between">
            <small>Enjoy <span>{{$batch->percent}}% off</span></small>

            <x-countdown.hours id="countdown-discount" :date="$batch->time_limit">
                <small>Time Left: <span id="countdown-discount">00h : 00m : 00s</span></small>
            </x-countdown.hours>
        </div>

        <div class="card-body">
            <div class="d-flex align-items-center ">
                @include('components.batch.batch-price')
            </div>

            @if ($batch->attendees > 0)
                <div class="mb-3">
                    <small class="mb-0">{{$batch->discount_slots}} out of {{$batch->signup_limit}} slots left</small>
                    <div class="courses-rating">
                        <div class="rating-progress-bar mt-1">
                            <div class="rating-line" style="width: {{$batch->discount_slots_percent}}%;"></div>
                        </div>
                    </div>
                </div>
            @endif

            @if ($user = Auth::user())
                <x-payment-modal :user="$user" :batch="$batch" :wallet="$user->wallet" />
            @else
                <div class="info-btn w-100">
                    <a href="/login">
                        <x-btn classes="btn-primary w-100 btn-hover-dark">
                            Login to Enroll
                        </x-btn>
                    </a>
                </div>
            @endif
        </div>
    </div>
@endif
