<script>
    $(() => {
        const date = moment("{{$date}}", "YYYY-MM-DD HH:mm:ss").format("YYYY/MM/DD HH:mm:ss");

        const countdown = $("#{{$id}}").countdown(date, function(event) {
            const days = event.offset.totalDays > 0 ? '%-Dd :' : ''
            const hours = event.offset.totalHours > 0 ? '%-Hh :' : ''
            const minutes = event.offset.totalMinutes > 0 ? '%-Mm :' : ''
            const seconds = event.offset.totalSeconds > 0 ? '%-Ss' : ''
            $(this).text(event.strftime(`${days} ${hours} ${minutes} ${seconds}`));
        }).on('finish.countdown', function(){
            window.location.reload()
        })

        console.log(countdown)
    })
</script>

<span>{{$slot}}</span>
