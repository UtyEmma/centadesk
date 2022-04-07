<script>
    let mask;

    $(document).ready(function(){
        mask = $(".amount-input-mask").inputmask({
            alias: "currency",
            "clearIncomplete": true
        });
    });

    function handleChange(){
        $("input[name='{{$name}}']").val($(".amount-input-mask").inputmask('unmaskedvalue'))
        console.log($("input[name='{{$name}}']").val())
    }
</script>

<input type="text" onchange="handleChange()" class="amount-input-mask {{$class}}" value="{{$value}}"/>
<input type="text" name="{{$name}}" value="{{$value}}" hidden>
