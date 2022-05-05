<x-student-layout>
    <div class="section section-padding mt-n10">
        <div class="container">
            <div class="courses-enroll-tab-content p-0 border-0">
                <div class="row">
                    <div class="col-md-8">
                        <div class="blog-details-wrapper mb-3 mt-0">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="courses-details mb-5 mt-0">
                                        <x-course-images :image="$batch->images" :video="$batch->video" :alt="$batch->title"/>
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <h4 class="mb-1">{{$batch->title}}</h4>
                                    <h5 class="mt-1 mb-1">{{$course->name}}</h5>

                                    <p>
                                        {{ $course->excerpt }}
                                    </p>

                                    <div>
                                        <a href="/learning/courses/{{$course->slug}}/{{$batch->short_code}}">
                                            <x-btn classes="{{request()->is('learning/courses/'.$course->slug.'/'.$batch->short_code.'') ? 'btn-primary btn-hover-dark' : 'btn-secondary border border-primary btn-hover-primary'}}">Overview <i class="icofont-ui-home"></i></x-btn>
                                        </a>
                                        <a href="/learning/courses/{{$course->slug}}/{{$batch->short_code}}/forum">
                                            <x-btn classes="{{request()->is('learning/courses/'.$course->slug.'/'.$batch->short_code.'/forum') ? 'btn-primary btn-hover-dark' : 'btn-secondary border border-primary btn-hover-primary'}}">
                                                Discussion <i class="icofont-chat"></i>
                                            </x-btn>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{$slot}}
                    </div>

                    <div class="col-md-4">
                        <div class="sidebar">
                            <h5 class="">Class Begins in:</h5>
                            <div class="card mb-3">
                                 <div class="card-body">
                                    <div class="p-2 radius text-center">
                                        <div class="mb-5">
                                            <x-countdown.hours :date="$batch->startdate" id="time-to-class">
                                                <h2 class="lh-0 mb-0 text-primary" id="time-to-class"></h2>
                                            </x-countdown.hours>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer bg-transparent">
                                    <p class="text-center">Join the Class</p>
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            @if ($batch->class_link)
                                                <a href="{{$batch->class_link}}" target="__blank">
                                                    <x-btn classes="btn-secondary btn-hover-primary px-4">Waiting Link <i class="icofont-external-link"></i></x-btn>
                                                </a>
                                            @endif
                                        </div>
                                        <div>
                                            <a  href="{{$batch->access_link}}" target="__blank">
                                                <x-btn classes="btn-primary btn-hover-dark px-4">Access Link <i class="icofont-external-link"></i></x-btn>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Sidebar Widget Information Start -->
                            <h5 class="">Meet your Mentor:</h5>
                            <x-mentor-card :mentor="$mentor" :class="''" :btn="true" />
                            <!-- Sidebar Widget Information End -->

                            <div class="w-100 mt-4">
                                @if (!$report)
                                <x-reports.modal :batch="$batch" />
                                @else
                                <x-reports.view :report="$report" :batch="$batch" />
                                @endif
                            </div>

                            <!-- Sidebar Widget Share Start -->
                            <div class="sidebar-widget">
                                <h5 class="">Share Course:</h5>

                                <ul class="social mt-0">
                                    <li><a href="#"><i class="flaticon-facebook"></i></a></li>
                                    <li><a href="#"><i class="flaticon-linkedin"></i></a></li>
                                    <li><a href="#"><i class="flaticon-twitter"></i></a></li>
                                    <li><a href="#"><i class="flaticon-skype"></i></a></li>
                                    <li><a href="#"><i class="flaticon-instagram"></i></a></li>
                                </ul>
                            </div>
                            <!-- Sidebar Widget Share End -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-student-layout>
