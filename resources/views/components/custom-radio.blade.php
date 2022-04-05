<input class="radio-custom" hidden type="radio" @checked($default) name="{{$name}}" id="{{$value}}" value="{{$value}}">
<label for="{{$value}}" class="cursor-pointer border p-4 py-5 d-flex justify-content-between align-items-center radius w-100">
    <span class="text-capitalize">{{$slot}}</span>
    <i class="icofont-check-circled fs-4 d-none"></i>
</label>
