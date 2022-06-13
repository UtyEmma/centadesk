<!-- Single Reviews Start -->
<div class="single-review bg-transparent">
    <div class="review-author align-items-center">
        <div >
            <x-profile-img :user="$review" :size="'60px'" />
        </div>
        <div class="author-content">
            <h6 class="mb-0">{{$review->firstname}} {{$review->lastname}}</h6>
            <span class="rating-star mt-0">
                <span class="rating-bar" style="width: {{$review->rating * 20}}%"></span>
            </span>
            <p class="mt-1">{{$review->review}}</p>
        </div>
    </div>
</div>
