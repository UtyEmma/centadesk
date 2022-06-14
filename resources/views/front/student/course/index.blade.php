<x-student-layout>
    <div class="section section-padding mt-n10">
        <div class="container">
            <div class="courses-enroll-tab-content p-0 border-0">
                <div class="row">
                    <div class="col-md-8">
                        <div class="blog-details-wrapper mb-3 mt-0">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="courses-details h-100 mb-5 mt-0">
                                        <x-course-images :image="$batch->images" :video="$batch->video" :alt="$batch->title"/>
                                    </div>
                                </div>

                                <div class="col-md-7 py-3 pb-0 pb-md-3">
                                    <h4 class="mb-1">{{$batch->title}}</h4>
                                    <h6 class="mt-1 mb-1">{{$course->name}}</h6>

                                    <p>
                                        {{ $batch->excerpt }}
                                    </p>

                                    <div class="my-2 col-md-12">
                                        @if (!$batch->isCompleted())
                                            <h6>Access this session:</h6>
                                            <div class="row">
                                                <div class="col-6">
                                                    @if ($batch->class_link)
                                                        <a href="{{$batch->class_link}}" class="btn btn-secondary btn-hover-primary w-100 btn-custom px-2" target="__blank">Waiting Link <i class="icofont-external-link"></i>
                                                        </a>
                                                    @endif
                                                </div>
                                                <div class="col-6">
                                                    <a  href="{{$batch->access_link}}" class="btn btn-primary btn-hover-dark w-100 btn-custom px-2" target="__blank">
                                                        Access Link <i class="icofont-external-link"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-3 bg-light radius mb-3 overflow-x-scroll">
                            <a class="{{request()->is('learning/courses/'.$course->slug.'/'.$batch->short_code.'') ? 'fw-bold' : ''}} text-primary me-2 pe-2" href="/learning/courses/{{$course->slug}}/{{$batch->short_code}}">
                                Overview
                                {{-- <i class="icofont-ui-home"></i> --}}
                            </a>
                            <a class="{{request()->is('learning/courses/'.$course->slug.'/'.$batch->short_code.'/resources') ? 'fw-bold' : ''}} text-primary me-2 p-2" href="/learning/courses/{{$course->slug}}/{{$batch->short_code}}/resources">
                                Resources
                                {{-- <i class="icofont-book-mark"></i> --}}
                            </a>

                            <a class="{{request()->is('learning/courses/'.$course->slug.'/'.$batch->short_code.'/forum') ? 'fw-bold' : ''}} text-primary me-2 p-2" href="/learning/courses/{{$course->slug}}/{{$batch->short_code}}/forum">
                                Discussion
                                {{-- <i class="icofont-chat"></i> --}}
                            </a>
                        </div>

                        {{$slot}}
                    </div>

                    <div class="col-md-4 mt-4 mt-md-0">
                        <div class="sidebar">

                            <x-batch-countdown :batch="$batch" />

                            <div class="my-3">
                                @if ($batch->isCompleted() && $batch->certificates)
                                    <a class="btn btn-primary btn-hover-dark btn-custom w-100" href="{{route('enrolledBatchRoute', [
                                        'shortcode' => $batch->short_code,
                                        'slug' => $course->slug
                                        ])}}/certificate">Download Certificate</a>
                                @endif
                            </div>

                            <div>
                                <a class="btn btn-secondary btn-hover-primary border border-primary btn-custom w-100" target="__blank" href="https://calendar.google.com/calendar/render?action=TEMPLATE&text={{$batch->title}}&details={{$batch->excerpt}}&dates={{Date::parse($batch->startdate)}}/{{Date::parse($batch->enddate)}}">
                                    Add to Google Calendar
                                </a>

                                <a class="btn btn-secondary btn-hover-primary border border-primary btn-custom w-100 mt-3" target="__blank" href="https://outlook.office.com/calendar/0/deeplink/compose?subject={{$batch->title}}&body={{$batch->excerpt}}&startdt={{Date::parse($batch->startdate)}}&enddt={{Date::parse($batch->enddate)}}&path=%2Fcalendar%2Faction%2Fcompose&rru=addevent">Add to Outlook.com</a>
                            </div>

                            <div class="sidebar-widget my-3">
                                <h5 class="">Share Course:</h5>
                                <x-share-link :link="request()->url()" />
                            </div>

                            @if ($report)
                                <div class="w-100 my-4 p-3 border radius">
                                    <x-reports.view :report="$report" :batch="$batch" />
                                </div>
                            @else
                                @if ($batch->reportable)
                                    <div class="w-100 my-4 p-3 border radius">
                                        <x-reports.modal :batch="$batch" />
                                    </div>
                                @endif
                            @endif

                            <div>
                                <h5 class="">Meet your Mentor:</h5>
                                <x-mentor-card :mentor="$mentor" :class="''" :btn="true" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-student-layout>
