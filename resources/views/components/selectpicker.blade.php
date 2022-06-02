<select name="{{$name ?? ''}}" onchange="{{$onchange ?? ''}}" class="selectpicker {{$classes ?? ''}} " data-live-search="{{$search ?? false}}" data-style="h-100 {{$class ?? ''}}" title="{{$title ?? ''}}" id="">
    {{$slot}}
</select>
