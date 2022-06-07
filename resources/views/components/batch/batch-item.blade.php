<div class="courses-item mt-2">
    <div class="item-thumb col-md-2">
        <a href="/me/courses/{{$course->slug}}/edit">
            <img src="{{$batch->images}}" alt="Courses">
        </a>
    </div>

    <div class="content-title">
        <div class="meta">
            <a href="#" class="lh-0 action text-capitalize">{{$batch->status}}</a>
            <a href="#" class="lh-0 action">{{$batch->price > 0 ? 'Paid' : 'Free'}}</a>
        </div>

        <h3 class="title mt-0 mb-2"><a href="/me/courses/{{$course->slug}}/{{$batch->short_code}}">{{$batch->title}}</a></h3>
        <div class="w-100 d-flex align-items-center">
            @include('components.batch.batch-price')
        </div>
    </div>

    <div class="content-wrapper">
        <a href="{{$course->slug}}/{{$batch->short_code}}">
            <x-btn classes="btn-secondary btn-hover-primary px-4">View Details</x-btn>
        </a>

        <a href="{{$course->slug}}/{{$batch->short_code}}/enroll">
            <x-btn classes="btn-primary btn-hover-dark px-4">Enroll</x-btn>
        </a>
    </div>
</div>
