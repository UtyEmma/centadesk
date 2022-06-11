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
                        <a href="/me/courses/create" class="btn btn-primary float-right btn-hover-dark w-auto">Add a New Course</a>
                    @endif
                </div>
            </div>
            <!-- Admin Courses Tab End -->

            <!-- Admin Courses Tab Content Start -->
            <div class="admin-courses-tab-content mt-3">
                <div class="tab-content">
                    <div class="tab-pane fade show active">
                        @if (count($courses) > 0)
                            @foreach ($courses as $course)
                                {{-- <div class="courses-item">
                                    <div class="content-title">
                                        <a class="mb-2" href="/me/courses/{{$course->slug}}">
                                            <h5 class="title">{{$course->name}}</h5>
                                        </a>
                                    </div>

                                    <div class="content-wrapper h-100">
                                        <div class="content-box my-0 mx-1">
                                            <p>Enrollments</p>
                                            <span class="count">{{$course->total_students}}</span>
                                        </div>

                                        <div class="content-box my-0 mx-1">
                                            <p>Sessions</p>
                                            <span class="count">
                                                    {{$course->total_batches}}
                                            </span>
                                        </div>

                                        <div class="courses-select mx-1 pt-0">
                                            <div class="dropdown">
                                                <button class="btn btn-primary btn-hover-dark dropdown-toggle  px-4 border-0 rounded-full" style="font-size: 14px; line-height: 3.5;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                  Options
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                  <li><a class="dropdown-item" href="/me/courses/{{$course->slug}}/edit">Edit</a></li>
                                                  <li><a class="dropdown-item" href="/me/courses/{{$course->slug}}">Details</a></li>
                                                  <li><a class="dropdown-item" href="/courses/{{$course->slug}}">Preview</a></li>
                                                  <li><x-swal class="dropdown-item text-danger" href="/me/courses/{{$course->slug}}/delete">Cancel</x-swal></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-hover-dark px-4 border-0 rounded-full btn-custom">
                                            Create Session
                                        </button>
                                    </div>
                                </div> --}}
                                <div class="single-courses col-md-4 mt-0 mb-4">
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
                                            <a href="/courses/{{$course->slug}}/batch/new" class="btn btn-primary btn-hover-dark btn-custom w-100">Create a New Session</a>
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
            <!-- Admin Courses Tab Content End -->

            <x-course-resources />

        </div>
    </div>
    <!-- Page Content Wrapper End -->
</x-app-layout>
