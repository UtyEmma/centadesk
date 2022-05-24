{{-- <script>
    function updateCurrency(e){
        console.log(`{{request()->url()}}?currency=${e.target.value}`)
        return window.location.href = `?currency=${e.target.value}`
    }
</script> --}}

<select id="d-currency" name="{{$name}}" onchange="updateCurrency(event)" class="selectpicker w-auto {{$class ?? ''}}" data-size="10" data-style="{{$btnClasses}}"  data-live-search="true" >
    @foreach ($data['currencies'] as $item)
        <option data-subtext="{{$item->name}}" title="{{$item->symbol}}" @selected($currency && $currency === $item->symbol) value="{{$item->symbol}}">{{$item->symbol}}</option>
    @endforeach
</select>
