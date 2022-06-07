@if ($batch->price > 0)
    @if ($batch->discount !== 'none')
        <p class="sale-parice text-start fw-bold text-primary">
            <span style="font-size: 14px;">{{request()->cookie('currency')}}</span>
            <span style="font-size: 20px;">{{number_format($batch->discount_price)}}</span>
        </p>
        <del class="old-parice text-start text-dark me-2" style="font-size: 15px; font-weight: 500;">
            {{request()->cookie('currency')}} {{number_format($batch->price)}}
        </del>

    @else
        <p class="sale-parice text-start fw-bold text-primary">
            <span style="font-size: 14px;">{{request()->cookie('currency')}}</span>
            <span style="font-size: 20px;">{{number_format($batch->price)}}</span>
        </p>
    @endif
@else
    <p class="sale-parice text-start fw-bold text-primary" style="font-size: 20px;">
        Free
    </p>
@endif
