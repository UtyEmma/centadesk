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
    });

    function toggleDiscount(e){
        $('#discount_container')[0].style.display = e.target.checked ? 'block' : 'none'
        $('#discount_switch_label').text(`Discounts ${e.target.checked ? 'Enabled' : 'Disabled'}`)
    }

    function setDiscountRate(e, flat, percent){
        if(e.target.value === 'flat'){
            $(`input[name="${percent}"]`)[0].parentElement.style.display = 'none'
            $(`input[name="${flat}"]`)[0].parentElement.style.display = 'block'
        }else if(e.target.value === 'percent'){
            $(`input[name="${flat}"]`)[0].parentElement.style.display = 'none'
            $(`input[name="${percent}"]`)[0].parentElement.style.display = 'block'
        }
    }

    function setDiscountType(e, time, signups){
        if(e.target.value === 'flat'){
            $(`input[name="${signups}"]`)[0].parentElement.style.display = 'none'
            $(`input[name="${time}"]`)[0].parentElement.style.display = 'block'
        }else if(e.target.value === 'signups'){
            $(`input[name="${time}"]`)[0].parentElement.style.display = 'none'
            $(`input[name="${signups}"]`)[0].parentElement.style.display = 'block'
        }
    }

    $(document).ready(() => {
        $('#discount_types').hide()
    })

    function setDiscount(e){
        if(e.target.value === 'fixed'){
            $(`#discount_types`).show()
            $(`input[name="percent"]`)[0].parentElement.style.display = 'none'
            $(`input[name="fixed"]`)[0].parentElement.style.display = 'block'
        }else if(e.target.value === 'percent'){
            $(`#discount_types`).show()
            $(`input[name="fixed"]`)[0].parentElement.style.display = 'none'
            $(`input[name="percent"]`)[0].parentElement.style.display = 'block'
        }else if (e.target.value === 'none') {
            $(`#discount_types`).hide()
        }
    }
</script>
