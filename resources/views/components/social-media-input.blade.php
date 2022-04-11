<div class="single-form">
    <label for="{{strtolower($name)}}-input" >{{$name}}</label>
    <div class="input-group mb-3">
        <span  class="input-group-text px-3 fs-6 radius-left" id="{{strtolower($name)}}">@isset($url)
            {{$url}}
            @else
                https://www.{{strtolower($name)}}.com/
            @endif
        </span>
        <input type="text" class="form-control w-auto" id="{{strtolower($name)}}-input" placeholder="@isset($placeholder){{$placeholder}}@else{{'Username'}}@endif
        " aria-describedby="{{strtolower($name)}}" value="{{$value ?? ''}}">
    </div>
</div>
