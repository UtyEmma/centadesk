@php
    $values = [1, 2, 3, 4, 5];
@endphp

<script>


    function highlightStar(index) {
        const stars = $('.star-rating-star')

        stars.each(function(i){
            const rating = $(this).data('rating')
            if(rating <= index) $(this).addClass('text-primary')
        })
    }

    function removeHighlight(obj, index) {
        const stars = $('.star-rating-star')
        const ratingInput = $('#rating-input')
        stars.each(function(i){
            const rating = $(this).data('rating')
            if(rating >= index && index != ratingInput.val()) $(this).removeClass('text-primary')
        })
    }

    function addRating(obj) {
        const rating = $(obj).data('rating')
        $('#rating-input').val(rating)
        highlightStar(rating)
    }

    function resetRating(obj) {
        const items = $(obj).children('label')
        const rating = $('#rating-input').val()

        items.each(function(index){
            const currentValue = $(this).data('rating')
            if(currentValue > rating) {
                $(this).removeClass('text-primary')
            }
        })
    }

    function setRating(){

    }
</script>

<ul id="rating" onmouseout="resetRating(this)" class="rating">
    @for ($i=0; $i < count($values); $i++)
        <label onmouseover="highlightStar({{$values[$i]}});" data-rating="{{$values[$i]}}" onmouseout="removeHighlight(this, {{$values[$i]}})"  onClick="addRating(this)" for="rating-radio-{{$values[$i]}}" class="star-rating-star icofont-star fs-2">
        </label>
    @endfor
    <input name="{{$name}}" id="rating-input" onchange="setRating(this)" hidden value="0"  />
</ul>
