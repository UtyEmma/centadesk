<script>
    $(document).ready(() => {
        new easepick.create({
            element: ".date-range-picker",
            css: [
                "https://cdn.jsdelivr.net/npm/@easepick/bundle@1.1.3/dist/index.css"
            ],
            zIndex: 10,
            format: "MMMM D, YYYY",
            header: "Select the Date Range",
            RangePlugin: {
                elementEnd: "{{$enddate}}"
            },
            LockPlugin: {
                minDate: new Date()
            },
            plugins: [
                "RangePlugin",
                "LockPlugin"
            ]
        })
    })
</script>

<label for="startdate" class="w-auto d-flex align-items-center border radius pe-3 ms-0">
    <input  class="form-control flex-1 border-0 radius-left radius-right-0 date-range-picker" id="{{$name}}"  name="{{$name}}" value="{{old('startdate')}}" placeholder="{{$placeholder}}" />
    <small for="short_code" class="h-100 w-auto fw-medium fs-5 text-primary">
        <i class="icofont-ui-calendar"></i>
    </small>
</label>
