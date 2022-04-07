<script>
    $(document).ready(function(){
        $(".integer-input-mask").inputmask({
            alias: "integer",
            "clearIncomplete": true
        });
    });
</script>

<input type="text" class="integer-input-mask {{$class}}" name="{{$name}}" />
