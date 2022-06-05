<script>
    function updateCurrency(e){
        const form = e.target.parentElement.parentElement;
        return form.submit()
    }
</script>
<form action="/currency/update" id="currency-form" onchange="updateCurrency(event)" method="POST">
        @csrf
    <select id="d-currency" name="{{$name}}" class="selectpicker {{$class ?? ''}}" data-size="10" data-style="{{$btnClasses}}"  data-live-search="true" >
        @foreach ($data['currencies'] as $item)
            <option data-subtext="{{$item->name}}" title="{{$item->symbol}}" @selected($currency && $currency === $item->symbol) value="{{$item->symbol}}">{{$item->symbol}}</option>
        @endforeach
    </select>
</form>
