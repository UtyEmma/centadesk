<div class="single-form">
    <label for="{{strtolower($name)}}-input" >{{$name}}</label>
    <div class="input-group mb-3">
        <span  class="input-group-text bg-transparent border border-end-0 px-3 fs-6 radius-left" id="{{strtolower($name)}}">@isset($url)
            {{$url}}
            @else
                {{$name}}
            @endif
        </span>
        <input type="text" class="form-control border-start-0 w-auto" id="{{strtolower($name)}}-input" placeholder="@isset($placeholder){{$placeholder}}@else{{'Username'}}@endif
        " aria-describedby="{{strtolower($name)}}" value="{{$value ?? ''}}">
    </div>
</div>
