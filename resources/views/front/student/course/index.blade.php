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

                                <div class="col-md-7">
                                    <h4 class="mb-1">{{$batch->title}}</h4>
                                    <h6 class="mt-1 mb-1">{{$course->name}}</h6>

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

                            <x-batch-countdown :batch="$batch" />

                            <div class="my-3">
                                @if ($batch->isCompleted() && $batch->certificates)
                                    <a class="btn btn-primary btn-hover-dark btn-custom w-100" href="{{route('enrolledBatchRoute', [
                                        'shortcode' => $batch->short_code,
                                        'slug' => $course->slug
                                        ])}}/certificate">Download Certificate</a>
                                @endif
                            </div>

                            <div class="my-3">
                                @if (!$batch->isCompleted())
                                    <h5>Access Links</h5>
                                    <div class="d-flex">
                                        <div class="me-4">
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
                                @endif
                            </div>

                            <div class="sidebar-widget my-3">
                                <h5 class="">Share Course:</h5>
                                <x-share-link :link="request()->url()" />
                            </div>

                            <div class="w-100 my-4 p-3 border radius">
                                @if ($report)
                                    <x-reports.view :report="$report" :batch="$batch" />
                                @else
                                    <x-reports.modal :batch="$batch" />
                                @endif
                            </div>

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
