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
            toast('error', "{{Session::get('error')}}")
        @elseif (Session::has('success'))
            toast('success', "{{Session::get('success')}}")
        @elseif(isset($errors) && count($errors->all()) > 0)
            toast('error', "Invalid Input fields")
        @endif
    })
</script>
