<div class="border radius card-body">
    <div class="info-price text-start">
        <div class="d-flex align-items-center ">
            <h5 class="fw-bold">
                <span style="font-size: 0.8rem;">
                    {{request()->cookie('currency')}}
                </span>
                {{number_format($batch->discount_price)}}
            </h5>
            <h6 style="font-size: 13px;" class="ms-1 price text-decoration-line-through text-left">
                {{request()->cookie('currency')}} {{number_format($batch->price)}}
            </h6>
        </div>
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
