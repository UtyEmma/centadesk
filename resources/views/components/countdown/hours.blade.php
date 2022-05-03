<script>
    $(() => {
        const date = moment("{{$date}}").format("YYYY/MM/DD");

        $("#{{$id}}").countdown(date, function(event) {
            var totalHours = event.offset.totalDays * 24 + event.offset.hours;
            $(this).html(event.strftime(totalHours + 'h : %Mm : %Ss'));
        })
    })
</script>

<span>{{$slot}}</span>
