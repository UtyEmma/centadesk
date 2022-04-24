@forelse (json_decode($tags) as $tag)
    <span class="tag-item text-capitalize">{{$tag->value}}</span>
@empty

@endforelse
