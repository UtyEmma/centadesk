<select id="d-currency" name="{{$name}}" class="py-2 mt-1 radius" style="box-sizing: border-box;">
    @foreach ($data['currencies'] as $item)
        <option @selected($currency && $currency === $item->symbol) value="{{$item->symbol}}">{{$item->symbol}} - {{$item->name}}</option>
    @endforeach
</select>
