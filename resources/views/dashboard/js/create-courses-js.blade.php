<script>

    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'Write a compelling description of your class here',
            height: 100,
            toolbar: [
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link']],
                ['view', ['fullscreen']]
            ]
        })

        $('input[name="signups_discount_percentage"]')[0].parentElement.style.display = 'none'
        $('input[name="time_discount_percentage"]')[0].parentElement.style.display = 'none'

        const tagifyElement = document.querySelector('input[name=tags]')
        new Tagify(tagifyElement, {
            placeholder: 'Separate Tags with a Comma'
        })
    });

    function toggleDiscount(e){
        $('#discount_container')[0].style.display = e.target.checked ? 'block' : 'none'
        $('#discount_switch_label').text(`Discounts ${e.target.checked ? 'Enabled' : 'Disabled'}`)
    }

    function setDiscountRate(e, flat, percent, container){
        if(e.target.value === 'flat'){
            $(`input[name="${percent}"]`)[0].parentElement.style.display = 'none'
            $(`input[name="${flat}"]`)[0].parentElement.style.display = 'block'
        }else if(e.target.value === 'percent'){
            $(`input[name="${flat}"]`)[0].parentElement.style.display = 'none'
            $(`input[name="${percent}"]`)[0].parentElement.style.display = 'block'
        }
    }


    var stepper

    $(document).ready(function () {
        stepper = new Stepper(document.querySelector('.bs-stepper'))
    })


    function handlePrevious(){
        stepper.previous()
    }

    function handleNext(){
        stepper.next()
    }


</script>
