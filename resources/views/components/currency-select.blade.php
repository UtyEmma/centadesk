<select id="d-currency" name="{{$name}}" class="selectpicker w-auto {{$class}}" data-size="10" data-style="{{$btn_classes ?? ''}}"  data-live-search="true" >
    @foreach ($data['currencies'] as $item)
        <option data-subtext="{{$item->name}}" title="{{$item->symbol}}" @selected($currency && $currency === $item->symbol) value="{{$item->symbol}}">{{$item->symbol}}</option>
    @endforeach
</select>
