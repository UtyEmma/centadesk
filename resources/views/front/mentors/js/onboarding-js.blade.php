<script>
    var stepper

    document.addEventListener('DOMContentLoaded', function () {
        stepper = new Stepper(document.querySelector('.bs-stepper'))
    })

    function next(){
        stepper.next()
    }

    function previous(){
        stepper.previous()
    }

    function connectMetaMask(){

    }

</script>
