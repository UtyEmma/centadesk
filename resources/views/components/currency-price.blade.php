<select readonly="{{$readonly}}" class="readonly my-select {{$class || ""}}" id="d-currency" name="{{$name}}">
    @foreach ($data['currencies'] as $item)
        <option @selected($currency && $currency === $item->symbol) value="{{$item->symbol}}">{{$item->symbol}}</option>
    @endforeach
  </select>
