<script>
    function toast(type, message){
        new Notify ({
            text: message,
            effect: 'slide',
            status: type,autoclose: true,
            autotimeout: 3000,
            speed: 300 // animation speed
        })
    }

    $(document).ready(() => {
        @if(Session::has('error'))
            // new Notify ({
            //     text: "{{Session::get('error')}}",
            //     effect: 'slide',
            //     status: 'error',
            //     autoclose: true,
            //     autotimeout: 3000,
            //     speed: 300 // animation speed
            // })
            toast('error', "{{Session::get('error')}}")
        @elseif (Session::has('success'))
            toast('success', "{{Session::get('success')}}")
        @elseif(count($errors->all()) > 0)
            toast('error', "Invalid Input fields")
        @endif
    })
</script>
