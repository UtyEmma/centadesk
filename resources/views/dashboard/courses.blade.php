<x-app-layout>
    @php
        $user = Auth::user();
    @endphp
    <!-- Page Content Wrapper Start -->
    <div class="page-content-wrapper pt-0 mt-3">
        <div class="container-fluid custom-container">


            <!-- Admin Courses Tab Start -->
            <div class="admin-courses-tab mt-0">
                <div class="mb-3">
                    <h4 class="my-0">Courses</h4>
                    <p class="my-0">Consider creating a new course to meet your student's demand.</p>
                </div>

                <div class="courses-tab-wrapper ">
                    @if ($user->kyc_status === 'approved')
                        <div class="tab-btn pt-0">
                            <a href="/me/courses/create" class="btn btn-primary float-right btn-hover-dark w-auto">Add a New Course</a>
                        </div>
                    @endif
                </div>
            </div>
            <!-- Admin Courses Tab End -->

            <x-mentor.kyc-warning :user="$user" />

            <!-- Admin Courses Tab Content Start -->
            <div class="admin-courses-tab-content">
                <div class="tab-content">
                    <div class="tab-pane fade show active">
                        @if (count($courses) > 0)
                            @foreach ($courses as $course)
                                <!-- Courses Item Start -->
                                <div class="courses-item">
                                    <div class="item-thumb col-md-2">
                                        <a href="/me/courses/{{$course->slug}}">
                                            <img src="{{json_decode($course->images)[0]}}" alt="Courses">
                                        </a>
                                    </div>

                                    <div class="content-title">
                                        <div class="meta">
                                            <a href="#" class="action">Live</a>
                                            <a href="#" class="action">Free</a>
                                            <a href="#" class="action">Public</a>
                                        </div>

                                        <h3 class="title mt-0 mb-2"><a href="/me/courses/{{$course->slug}}">{{$course->name}}</a></h3>
                                        <a href="/me/courses/{{$course->slug}}">
                                            <x-btn classes="btn-secondary btn-hover-primary px-4">View Batches</x-btn>
                                        </a>
                                    </div>

                                    <div class="content-wrapper">
                                        <div class="content-box mx-1">
                                            <p>Earned</p>
                                            <span class="count">{{$course->currency}} {{number_format($course->earnings)}}</span>
                                        </div>

                                        <div class="content-box mx-1">
                                            <p>Enrollments</p>
                                            <span class="count">{{$course->total_students}}</span>
                                        </div>

                                        <div class="content-box mx-1">
                                            <p>Course Rating</p>
                                            <span class="count">
                                                    {{$course->rating}}.0
                                                <span class="rating-star">
                                                    <span class="rating-bar" style="width: {{$course->rating * 20 }}%;"></span>
                                                </span>
                                            </span>
                                        </div>

                                        <div class="courses-select mx-1">
                                            <select class="selectpicker w-auto" data-title="Options" >
                                                <option data-display="This Month">Preview</option>
                                                <option data-display="This Month">Edit</option>
                                                <option value="1">Delete</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Courses Item End -->
                            @endforeach
                        @else
                            <div class="w-100 text-center border p-4 py-8 mt-3 radius">
                                <div class="text-center">You have not created any courses yet</div>
                                <a href="/me/courses/create" class="btn btn-primary mx-auto w-auto mt-5">Create a Course</a>
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
