<!-- Single Reviews Start -->
<div class="single-review">
    <div class="review-author">
        <div class="author-thumb">
            <img src="{{$review->avatar}}" alt="Author">
            <i class="icofont-quote-left"></i>
        </div>
        <div class="author-content">
            <h4 class="name">{{$review->firstname}} {{$review->lastname}}</h4>
            <span class="rating-star">
                    <span class="rating-bar" style="width: {{$review->rating * 20}}%"></span>
            </span>
        </div>
    </div>
    <p>{{$review->review}}</p>
</div>
<!-- Single Reviews End -->
