<div class="single-form">
    <label for="{{strtolower($name)}}-input" >{{$name}}</label>
    <input type="text" class="form-control w-100" name="{{strtolower($name)}}" id="{{strtolower($name)}}-input" placeholder="@isset($placeholder){{$placeholder}}@else{{'Username'}}@endif
    " aria-describedby="{{strtolower($name)}}" value="{{$value ?? ''}}">
</div>
