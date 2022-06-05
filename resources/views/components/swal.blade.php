<script>
    function showWarning(e){
        e.preventDefault()

        Swal.fire({
            title: 'Are you sure?',
            text: "{{$message ?? 'This action cannot be reversed!'}}",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#309255',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Proceed!'
        }).then((result) => {
            if(result.isConfirmed){
                window.location.href = e.target.href
            }
        })
    }
</script>

<a href="{{$href}}" class="{{$class ?? ''}}" onclick="showWarning(event)">{{$slot}}</a>
