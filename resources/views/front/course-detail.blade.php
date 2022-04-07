<x-guest-layout>

    <x-page-banner>
        <x-slot name="current">
            Courses
        </x-slot>
        <x-slot name="title">
            {{$course->name}}
        </x-slot>
    </x-page-banner>

    <!-- Courses Start -->
    <div class="section section-padding mt-n10">
        <div class="container">
            <div class="row gx-10">
                <div class="col-lg-8">
                    <!-- Courses Details Start -->
                    <div class="courses-details">
                        <div class="courses-details-images">
                            <img src="{{json_decode($batch->images)[0] ?? asset('images/courses/courses-details.jpg')}}" alt="Courses Details">

                            <div class="courses-play">
                                <img src="{{asset('images/courses/circle-shape.png')}}" alt="Play">
                                <a class="play video-popup" href="{{$batch->video}}"><i class="flaticon-play"></i></a>
                            </div>
                        </div>

                        <div class="w-100 mt-4 mb-0">
                            @if ($course->tags)
                                @foreach (json_decode($course->tags) as $tag)
                                    <span class="tag-item text-capitalize">{{$tag->value}}</span>
                                @endforeach
                            @endif
                        </div>

                        <div class="w-100 d-flex justify-content-between">
                            <h3 class="title mt-2">{{$course->name}}</h3>

                        </div>

                        <div class="courses-details-admin">
                            <div class="admin-author">
                                <div class="rounded-img">
                                    <img src="{{asset($mentor->avatar)}}" alt="Author">
                                </div>
                                <div class="author-content">
                                    <a class="name" href="#">{{$mentor->firstname}} {{$mentor->lastname}}</a>
                                    <span class="Enroll">{{$course->total_students}} Enrolled Students</span>
                                </div>
                            </div>
                            <div class="admin-rating">
                                <span class="rating-count">{{$course->rating}}.0</span>
                                <span class="rating-star">
                                        <span class="rating-bar" style="width: {{$course->rating * 20}}%;"></span>
                                </span>
                                <span class="rating-text">({{$course->reviews}} Reviews)</span>
                            </div>
                        </div>

                        <!-- Courses Details Tab Start -->
                        <div class="courses-details-tab">
                            <!-- Details Tab Menu Start -->
                            <h5 class="tab-title">Course Description</h5>
                            <div class="details-tab-menu">
                                <p>
                                    {!! $course->desc !!}
                                </p>
                            </div>
                            <!-- Details Tab Menu End -->
                        </div>
                        <!-- Courses Details Tab End -->
                    </div>
                    <!-- Courses Details End -->

                    <div class="courses-details-tab">
                        <!-- Details Tab Menu Start -->
                        <h5 class="tab-title">Course Batches</h5>

                        {{-- <div class="row"> --}}
                            @foreach ($course->batches as $batch)
                                {{-- <div class="col-md-6"> --}}
                                    <x-batch.batch-item :course="$course" :user="Auth::user()" :batch="$batch" :mentor="$course->mentor" />
                                {{-- </div> --}}
                            @endforeach
                        {{-- </div> --}}
                        <!-- Details Tab Menu End -->
                    </div>

                </div>
                <div class="col-lg-4">

                </div>
            </div>
        </div>
    </div>
    <!-- Courses End -->

    <x-call-to-action></x-call-to-action>
</x-guest-layout>
