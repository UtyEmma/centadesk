<script>
    $(document).ready(() => {
        new easepick.create({
            element: ".date-range-picker",
            css: [
                "{{asset('css/plugins/easepick.min.css')}}"
            ],
            zIndex: 1111,
            format: "HH:mm, DD MMM, YYYY",
            header: "Select the Date and Time Range",
            RangePlugin: {
                elementEnd: "{{$enddate}}"
            },
            LockPlugin: {
                minDate: new Date()
            },
            TimePlugin: {
                format12: true
            },
            plugins: [
                "RangePlugin",
                "LockPlugin",
                "TimePlugin"
            ]
        })
    })
</script>

<style>
    .easepick-wrapper{
        z-index: 1111 !important;
    }
</style>

<label for="startdate" class="w-auto d-flex align-items-center border radius pe-3 ms-0">
    <input  class="form-control flex-1 border-0 radius-left radius-right-0 date-range-picker" id="{{$name}}"  name="{{$name}}" value="{{old('startdate')}}" placeholder="{{$placeholder}}" />
    <small for="short_code" class="h-100 w-auto fw-medium fs-5 text-primary">
        <i class="icofont-ui-calendar"></i>
    </small>
</label>
