<div class="card border border-danger radius">
    <div class="card-header bg-danger text-white radius-top d-flex justify-content-between">
        <small>Enjoy <span>{{$batch->percent}}% off</span></small>

        <x-countdown.hours id="countdown-discount" :date="$batch->time_limit">
            <small>Time Left: <span id="countdown-discount"></span></small>
        </x-countdown.hours>
    </div>

    <div class="card-body">
        <div class="d-flex align-items-center ">
            <h5 class="fw-bold">
                {{request()->cookie('currency')}}

                {{number_format($batch->discount_price)}}
            </h5>
            <h6 style="font-size: 13px;" class="ms-1 price text-decoration-line-through text-left">
                {{request()->cookie('currency')}} {{number_format($batch->price)}}
            </h6>
            <span>
            </span>
        </div>

        <div class="mb-3">
            <small class="mb-0">5 out of {{$batch->signup_limit}} slots left</small>
            <div class="courses-rating">
                <div class="rating-progress-bar mt-1">
                    <div class="rating-line" style="width: 38%;"></div>
                </div>
            </div>
        </div>

        @if ($user = Auth::user())
            <x-payment-modal :user="$user" :batch="$batch" :wallet="$user->wallet" />
        @else
            <div class="info-btn w-100">
                <a href="/login">
                    <x-btn class="btn-primary w-100 btn-hover-dark">
                        Login to Enroll
                    </x-btn>
                </a>
            </div>
        @endif
    </div>
</div>
