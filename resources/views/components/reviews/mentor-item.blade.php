<div class="single-courses-rating p-0 border-0 mt-0 mb-3">
    <div class="rating">
        <div class="rating-author">
            <img src="{{$review->avatar}}" alt="Author">
        </div>
        <div class="rating-content">
            <div class="d-flex justify-content-between mb-2">
                <div>
                    <h4 class="name">{{$review->firstname}} {{$review->lastname}}</h4>
                    <span class="date mt-1">Posted: {{$review->updated_at}}</span>
                </div>

                <div class="average-rating">
                    <span class="rating-star">
                            <span class="rating-bar" style="width: {{$review->rating}}%;"></span>
                    </span>
                </div>
            </div>

            <p>{{$review->review}}</p>
        </div>
    </div>
</div>
