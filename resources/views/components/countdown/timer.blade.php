<script>
    $(() => {
        const date = moment("{{$date}}", "HH:mm, DD MMM, YYYY").format("YYYY/MM/DD HH:mm:ss");
        $("#{{$id}}").countdown(date, function(event) {
            $(this).text(event.strftime('%-Dd : %-Hh : %-Mm : %-Ss'));
        })
    })
</script>

<span>{{$slot}}</span>
