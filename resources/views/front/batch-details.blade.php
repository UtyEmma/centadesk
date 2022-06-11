<x-guest-layout>
    @inject('parsedate', 'App\Library\DateTime' )
    <x-page-title title="{{$batch->title}} of {{$course->name}} by {{$mentor->firstname}} {{$mentor->lastname}}" />
    <x-metadata :title="$batch->name" :image="$batch->images" :excerpt="$batch->excerpt" />

    @php
        $startdate = Date::parse($batch->startdate);
        $enddate = Date::parse($batch->enddate);
    @endphp

    <x-page-banner></x-page-banner>

    <div class="section section-padding mt-0 pt-0">
        <div class="container">
            <div class="row gx-10">
                <div class="col-lg-8">
                    <div class="courses-details mt-0">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="courses-details h-100 mb-5 mt-0">
                                    <x-course-images :image="$batch->images" :video="$batch->video" :alt="$batch->title" />
                                </div>
                            </div>

                            <div class="col-md-7 py-2">
                                <h4 class="mb-2">{{$batch->title}}</h4>

                                <a href="/courses/{{$course->slug}}">
                                    <h6 class="mb-1">{{$course->name}}</h6>
                                </a>

                                <p class="mb-0">{{$batch->excerpt}}</p>

                                <div class="mt-2 w-100">
                                    <div class="author-content ms-0 p-0 d-flex align-items-center w-100">
                                        <x-profile-img :user="$mentor" size="40px" />
                                        <a style="font-weight: 500" class="ms-2" href="/mentors/{{$mentor->username}}">{{$mentor->firstname}} {{$mentor->lastname}}</a>
                                    </div>
                                    <div class="mt-2">
                                        <div class="d-flex justify-content-between">
                                            <h6>
                                                <i class="text-primary mr-5 fs-5 icofont-calendar"></i>
                                                <small>{{$startdate->format('M jS, g:i A')}}</small>
                                                -
                                                <small>{{$enddate->format('M jS, g:i A')}}</small>
                                            </h6>
                                        </div>

                                        <small class="">
                                            <i class="text-primary fs-5 icofont-user"></i>
                                            {{$course->total_students}} Students
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="courses-details-tab">
                            <h6 class="tab-title">About this batch</h6>

                            {!! $batch->desc !!}

                        </div>
                        <div class="courses-details-tab">
                            <h6 class="tab-title">What you will learn in this batch?</h6>
                            <p>
                                @if ($batch->objectives)
                                    @forelse (json_decode($batch->objectives) as $objective)
                                        <ul>
                                            <li class="my-2"><i class="icofont-check text-primary fs-4"></i> {{$objective}}</li>
                                        </ul>
                                    @empty
                                    @endforelse
                                @endif
                            </p>
                        </div>

                        <div class="courses-details-tab mt-0 p-0">
                            <div class="mt-4">

                                <h6 class="tab-title">Tags</h6>

                                <div class="widget-tags p-0 border-0 mt-3">
                                    <ul class="tags-list d-flex flex-wrap">
                                        @forelse (json_decode($batch->tags) as $tag)
                                            <li class="text-capitalize"><a class="px-3">{{$tag->value}}</a></li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-5 mt-md-0">
                    <div class="sidebar mt-0 p-0">
                        <div class="sidebar-widget mb-4 mt-0">
                            <h5 class="tab-title mb-2">Invite your friends</h5>
                            <x-share-link :link="env('MAIN_APP_URL').'/'.$batch->short_code" />
                        </div>

                        <div class="sidebar-widget mt-md-0 mb-3">
                            <x-batch-countdown :batch="$batch" />
                        </div>

                        @if (!$batch->enrolled)
                            <div class="sidebar-widget mt-md-0 mb-3">
                                @if (now() > Date::parse($batch->enddate) || Date::parse($batch->startdate)->lessThanOrEqualTo(Date::now()) && Date::parse($batch->enddate)->greaterThanOrEqualTo(Date::now()))
                                @else
                                    <h5>Enroll for this Batch</h5>
                                    @if ($batch->discount === 'none')
                                        <x-price-normal-card :batch="$batch" />
                                    @else
                                        <x-price-discount-card :batch="$batch" />
                                    @endif
                                @endif
                            </div>

                        @else
                            <div class="sidebar-widget mt-md-0 mb-3 p-5 text-center border radius">
                                <h5>You are already enrolled for this session!</h5>
                                <a href="/learning/courses/{{$course->slug}}/{{$batch->short_code}}" class="btn btn-primary btn-custom btn-hover-dark">View Enrollment</a>
                            </div>
                        @endif

                        <div class="sidebar-widget mt-5">
                            <h5>Meet the Mentor</h5>
                            <x-mentor-card :mentor="$mentor" :class="''" :btn="true" />
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Courses End -->

    <x-mentor-cta />
</x-guest-layout>
