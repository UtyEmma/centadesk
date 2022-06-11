<script>
    $(() => {
        const date = moment("{{$date}}", "HH:mm, DD MMM, YYYY").format("YYYY/MM/DD HH:mm:ss");
        $("#{{$id}}").countdown(date, function(event) {
            const days = event.offset.totalDays > 0 ? '%-Dd :' : ''
            const hours = event.offset.totalHours > 0 ? '%-Hh :' : ''
            const minutes = event.offset.totalMinutes > 0 ? '%-Mm :' : ''
            const seconds = event.offset.totalSeconds > 0 ? '%-Ss' : ''
            $(this).text(event.strftime(`${days} ${hours} ${minutes} ${seconds}`));
        }).on('finish.countdown', function(){
            window.location.reload()
        })
    })
</script>

<span>{{$slot}}</span>
