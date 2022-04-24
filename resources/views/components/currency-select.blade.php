<select id="d-currency" name="{{$name}}" class="selectpicker w-100 {{$class}}" data-size="10" data-style="btn-warning"  data-live-search="true" >
    @foreach ($data['currencies'] as $item)
        <option @selected($currency && $currency === $item->symbol) value="{{$item->symbol}}">{{$item->symbol}} - {{$item->name}}</option>
    @endforeach
</select>
