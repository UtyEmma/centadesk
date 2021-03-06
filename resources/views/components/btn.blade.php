<button
    onclick="@isset($onclick)
        {{$onclick}}
    @endisset"
    onchange="@isset($onchange)
        {{$onchange}}
    @endisset"
    onblur="@isset($onblur)
        {{$onblur}}
    @endisset"
    class="btn @isset($classes) {{$classes}} @endisset"
    type="@isset($type) {{$type}} @endisset"
    style="font-size: 14px; line-height: 3.5; @isset($style) {{$style}} @endisset"
>{{$slot}}</button>
