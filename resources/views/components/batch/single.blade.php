<div class="single-courses mt-0 mb-4 radius h-100">
    @php
        $startdate = Date::parse($batch->startdate);
    @endphp
    <div class="courses-images position-relative overflow-hidden radius" style="height: 200px">
        <a href="{{"/$batch->short_code"}}">
            <img class="img-cover" src="{{$batch->images}}" alt="Courses">
        </a>

        <div class="light-tag bg-white shadow-sm position-absolute" style="right: 10px; top: 10px;">
            @if ($batch->isOngoing())
                Happening Now
            @elseif ($batch->isCompleted())
                Completed
            @elseif ($batch->attendees && $batch->enrollment_count > $batch->attendees)
                Full
            @elseif ($batch->isUpcoming())
                Upcoming
            @endif
        </div>
    </div>

    <div class="courses-content pt-2">
        <small style="font-size: 15px; font-weight: 500;">{{$startdate->format('M jS, g:i A')}}</small>
        <h5 class="mb-0"><a href="/courses/{{$batch->course->slug}}/{{$batch->short_code}}">{{$batch->title}}</a></h5>

        @if ($batch->course)
            <p style="font-size: 15px; font-weight: 500;">
                <a class="mt-0" href="/courses/{{$batch->course->slug}}">{{$batch->course->name}}</a>
            </p>
        @endif

        <div class="courses-author mt-2">
            <div class="author">
                <div class="author-thumb">
                    <a href="/mentors/{{$batch->mentor->username}}" class="rounded-img">
                        <img src="{{$batch->mentor->avatar ?? asset('images/icon/user.png')}}" alt="Author">
                    </a>
                </div>
                <div class="author-name">
                    <div>
                        <a class="mb-1 name" style="font-weight: 500; line-height: 2px;"  href="/mentors/{{$batch->mentor->username}}">
                            {{$batch->mentor->firstname}} {{$batch->mentor->lastname}}
                            <span class="ms-0"><x-mentor-verified :status="$batch->mentor->is_verified" /></span>
                            </a>
                        <p style="font-size: 12px; line-height: 1px;" class="mt-1 mb-2">{{$batch->mentor->specialty}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-2 p-2 bg-secondary radius border border-primary">
            <div>
                <x-layered-profile-images :users="$batch->enrollments" />
            </div>
            <div>
                @include('components.batch.batch-price')
            </div>
        </div>

        <a href="/{{$batch->short_code}}" class="btn btn-primary btn-hover-dark w-100 mt-2 btn-custom">Enroll Now</a>

    </div>
</div>
