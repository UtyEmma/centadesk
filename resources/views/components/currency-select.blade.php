<select id="d-currency" name="{{$name}}" class="{{$class}}" style="box-sizing: border-box;">
    @foreach ($data['currencies'] as $item)
        <option @selected($currency && $currency === $item->symbol) value="{{$item->symbol}}">{{$item->symbol}} - {{$item->name}}</option>
    @endforeach
</select>
