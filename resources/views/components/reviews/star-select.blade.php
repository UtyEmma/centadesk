<ul id="rating" class="rating">
    <li class="star" title='Very Poor' data-value='1'><i class="icofont-star"></i></li>
    <li class="star" title='Poor' data-value='2'><i class="icofont-star"></i></li>
    <li class="star" title='Average' data-value='3'><i class="icofont-star"></i></li>
    <li class="star" title='Good' data-value='4'><i class="icofont-star"></i></li>
    <li class="star" title='Excellent' data-value='5'><i class="icofont-star"></i></li>
</ul>

<input name={{$name}} id="ratingInput" hidden />

<script>
    $(document).ready(function(){
        /*--
            Rating Script
        -----------------------------------*/
        $("#rating li").on('mouseover', function(){
            var onStar = parseInt($(this).data('value'), 10);
            var siblings = $(this).parent().children('li.star');
            Array.from(siblings, function(item){
                var value = item.dataset.value;
                var child = item.firstChild;
                if(value <= onStar){
                    child.classList.add('hover')
                } else {
                    child.classList.remove('hover')
                }
            })
        })

        $("#rating").on('mouseleave', function(){
            var child = $(this).find('li.star i');
            Array.from(child, function(item){
                item.classList.remove('hover');
            })
        })


        $('#rating li').on('click', function(e) {
            var onStar = parseInt($(this).data('value'), 10);
            $('#ratingInput').val(onStar)
            var siblings = $(this).parent().children('li.star');
            Array.from(siblings, function(item){
                var value = item.dataset.value;
                var child = item.firstChild;
                if(value <= onStar){
                    child.classList.remove('hover', 'fa-star-o');
                    child.classList.add('star')
                } else {
                    child.classList.remove('star');
                    child.classList.add('fa-star-o')
                }
            })
        })
    })
</script>
