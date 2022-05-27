<x-guest-layout>
    <x-page-title title="{{$mentor->firstname}} {{$mentor->lastname}} - Mentor on Libraclass" />
    <x-page-banner>
            <!-- Page Banner Start -->
            {{-- <div class="m-0">
                <ul class="breadcrumb mb-0">
                    <li><a href="/">Home</a></li>
                    <li class="/mentors">Mentors</li>
                    <li class="active">Profile</li>
                </ul>
                <h4 class="title mt-0">{{$mentor->firstname}} {{$mentor->lastname}}</h4>
            </div> --}}
            <!-- Page Banner End -->
    </x-page-banner>

    <!-- Courses Start -->
    <div class="section section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single-team mb-3 mt-0" style="position: sticky; top: 120px;" >
                        <div class="col-6 col-md-7 mx-md-auto">
                            <div class="team-thumb ratio ratio-1x1 p-0" style="position: relative;">
                                <img src="{{$mentor->avatar ?? asset('images/author/author-04.jpg')}}" class="ratio ratio-1x1" style="object-fit: cover;" alt="Author">
                            </div>
                        </div>
                        <div class="sidebar-widget mt-3 d-md-block d-none">
                            <ul class="social mt-0 justify-content-center">
                                <li><a href="{{env('FACEBOOK_PROFILE_URL')}}{{$mentor->facebook}}" target="_blank" rel="noopener noreferrer"><i class="flaticon-facebook"></i></a></li>
                                <li><a href="{{env('INSTAGRAM_PROFILE_URL')}}{{$mentor->instagram}}" target="_blank" rel="noopener noreferrer"><i class="flaticon-instagram"></i></a></li>
                                <li><a href="{{env('TWITTER_PROFILE_URL')}}{{$mentor->twitter}}" target="_blank" rel="noopener noreferrer"><i class="flaticon-twitter" data-lang="en" data-show-count="false"></i></a></li>
                            </ul>

                            <div class="col-md-9 mx-auto my-3">
                                <a href="{{$mentor->website}}" target="_blank" class="btn my-2 btn-custom btn-primary btn-hover-dark w-100">Visit Website</a>
                                <a href="{{$mentor->resume}}" target="_blank" class="btn my-2 btn-custom btn-outline-info btn-hover-dark w-100">My Resume</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 mt-3 mt-md-0">
                    <div>
                        <p class="mb-0 fw-bold">Mentor</p>
                        <h2 class="mb-0">{{$mentor->firstname}} {{$mentor->lastname}} <x-mentor-verified :status="$mentor->is_verified" /></h2>
                        <small class="mb-0">
                            {{$mentor->specialty}}
                        </small>

                        <div class="single-courses border-0 p-0 mt-0">
                            <div class="courses-content py-0">
                                <div class="courses-price-review mt-2">
                                    <div class="courses-review d-flex justify-content-between w-100 align-items-center">
                                        <div class="d-flex">
                                            <div class="me-2">
                                                <span class="rating-count">{{$mentor->avg_rating}}.0</span>
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: {{$mentor->avg_rating * 20}}%;"></span>
                                                </span>
                                            </div>

                                            <small class="text">({{$mentor->reviews_count}} {{Str::plural('review', $mentor->reviews_count)}})</small>

                                            <span class="mx-2">||</span>

                                            {{$mentor->courses_count}} {{Str::plural('student', $mentor->courses_count)}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="my-3">
                        <h6>About Me</h6>
                        <p>
                            {{$mentor->desc}}
                        </p>

                        <div class="sidebar-widget mt-3 d-md-none d-block">
                            <ul class="social mt-0 justify-content-start">
                                <li><a href="{{env('FACEBOOK_PROFILE_URL')}}{{$mentor->facebook}}" target="_blank" rel="noopener noreferrer"><i class="flaticon-facebook"></i></a></li>
                                <li><a href="{{env('INSTAGRAM_PROFILE_URL')}}{{$mentor->instagram}}" target="_blank" rel="noopener noreferrer"><i class="flaticon-instagram"></i></a></li>
                                <li><a href="{{env('TWITTER_PROFILE_URL')}}{{$mentor->twitter}}" target="_blank" rel="noopener noreferrer"><i class="flaticon-twitter" data-lang="en" data-show-count="false"></i></a></li>
                            </ul>

                            <div class="col-md-9 mx-auto my-3">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="{{$mentor->website}}" target="_blank" class="btn my-2 btn-custom btn-primary btn-hover-dark w-100">Visit Website</a>
                                    </div>

                                    <div class="col-6">
                                        <a href="{{$mentor->resume}}" target="_blank" class="btn my-2 btn-custom btn-outline-info btn-hover-dark w-100">My Resume</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <h6>My Work Experience</h6>
                        <div class="row">
                            @foreach (json_decode($mentor->experience) as $experience)
                                <div class="col-md-6">
                                    <div class="border radius p-3 my-2 d-flex align-items-center">
                                        <div>
                                            <i class="icofont-bag-alt fs-4"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p style="font-weight: 500" class="mb-0">{{$experience->role}} - <small class="fw-normal">{{$experience->company}}</small></p>
                                            <p class="mb-0"></p>
                                            <p style="font-size: 13px;">{{$experience->startdate}} - {{$experience->enddate}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-3">
                        <h6>My Education</h6>
                        <div class="row">
                            @foreach (json_decode($mentor->qualification) as $education)
                                <div class="col-md-6">
                                    <div class="bg-white border radius p-3 my-2 d-flex align-items-center">
                                        <div>
                                            <i class="icofont-graduate fs-4"></i>
                                        </div>
                                        <div class="ms-3">
                                            <p class="mb-0" style="font-weight: 500;">{{$education->qualification}} </p>
                                            <small> <span style="font-weight: 500;">{{$education->institution}}</span> - {{$education->date}}</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-5">
                        @if ($courses->count())
                            <h6 class="lh-0 mb-3">My Courses</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    @foreach ($courses as $course)
                                        <x-courses.single-course-card :course="$course" :mentor="$mentor" />
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>
