<script>
    $(() => {
        const date = moment("{{$date}}").format("YYYY/MM/DD");

        $("#{{$id}}").countdown(date, function(event) {
            $(this).text(
                event.strftime('%-Dd : %-Hh : %-Mm : %-Ss'));
        })
    })
</script>

<span>{{$slot}}</span>
