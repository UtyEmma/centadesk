<x-app-layout>
    @php
        $user = Auth::user();
    @endphp
    <!-- Page Content Wrapper Start -->
    <x-page-title title="Mentor Dashboard - Courses" />
    <div class="page-content-wrapper">
        <div class="container-fluid custom-container">


            <!-- Admin Courses Tab Start -->
            <div class="admin-courses-tab mt-0">
                <div class="mb-3">
                    <h4 class="my-0">My Courses</h4>
                    <p class="my-0">Consider creating a new course to meet your student's demand.</p>
                </div>

                <div class="courses-tab-wrapper ">
                    @if ($user->kyc_status === 'approved')
                        <a href="/me/courses/create" class="btn btn-primary btn-custom float-right btn-hover-dark w-auto">Add a New Course</a>
                    @endif
                </div>
            </div>
            <!-- Admin Courses Tab End -->

            <!-- Admin Courses Tab Content Start -->
            <div class="admin-courses-tab-content mt-3">
                <div class="tab-content">
                    <div class="tab-pane fade show active">
                        <div class="row">
                            @if (count($courses) > 0)
                                @foreach ($courses as $course)
                                    <div class="col-md-4">
                                        <div class="single-courses mt-0 mb-4">
                                            <div class="courses-content pt-0">
                                                <h5 class="mb-0"><a href="/me/courses/{{$course->slug}}">{{$course->name}}</a></h5>

                                                <p class="fw-bold text-primary mb-1">
                                                    <span style="font-size: 13px;">
                                                        {{$course->batches_count}} {{Str::plural('Session', $course->batches_count)}}
                                                        |
                                                        {{$course->enrollments_count}} {{Str::plural('Student', $course->enrollments_count)}}
                                                    </span>
                                                </p>

                                                <div class="courses-author mt-2">
                                                    <div class="author">
                                                        <div class="author-thumb">
                                                            <a href="/mentors/{{$course->mentor->username}}" class="rounded-img">
                                                                <img src="{{$course->mentor->avatar ?? asset('images/icon/user.png')}}" alt="Author">
                                                            </a>
                                                        </div>
                                                        <div class="author-name">
                                                            <div>
                                                                <a class="mb-1 name" style="font-weight: 500; line-height: 2px;"  href="/mentors/{{$course->mentor->username}}">
                                                                    {{$course->mentor->firstname}} {{$course->mentor->lastname}}
                                                                    <span class="ms-0"><x-mentor-verified :status="$course->mentor->is_verified" /></span>
                                                                </a>
                                                                <p style="font-size: 12px; line-height: 1px;" class="mt-1 mb-2">{{$course->mentor->specialty}}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-2">
                                                    <a href="/me/courses/{{$course->slug}}/batch/new" class="btn btn-primary btn-hover-dark btn-custom w-100">Create a New Session</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="w-100 text-center border p-4 py-8 mt-3 radius">
                                    <div class="text-center">You have not created any courses yet</div>
                                    <a href="/me/courses/create" class="btn btn-primary btn-hover-dark mx-auto w-auto mt-5">Create a Course</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- Admin Courses Tab Content End -->

            <x-course-resources />

        </div>
    </div>
    <!-- Page Content Wrapper End -->
</x-app-layout>
