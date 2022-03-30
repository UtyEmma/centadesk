<x-app-layout>
    @php
        $user = Auth::user();
    @endphp
    <!-- Page Content Wrapper Start -->
    <div class="page-content-wrapper">
        <div class="container-fluid custom-container">

            @if ($user->kyc_status === 'pending')
                <!-- Message Start -->
                <div class="message">
                    <div class="message-icon">
                        <img src="{{asset('images/menu-icon/icon-6.png')}}" alt="">
                    </div>
                    <div class="message-content">
                        <p>
                            Your Mentor account is under review. You will be able to start creating courses after your account is approved.
                            <br/>
                            This should take between a few hours to a few days.
                        </p>
                    </div>
                </div>
                <!-- Message End -->
            @endif

            <!-- Admin Courses Tab Start -->
            <div class="admin-courses-tab mt-0">
                <h3 class="title">Courses</h3>

                <div class="courses-tab-wrapper">
                    <div class="tab-btn">
                        <a href="/me/courses/create" class="btn btn-primary btn-hover-dark">Add a New Course</a>
                    </div>
                </div>
            </div>
            <!-- Admin Courses Tab End -->

            <!-- Admin Courses Tab Content Start -->
            <div class="admin-courses-tab-content">
                <div class="tab-content">
                    <div class="tab-pane fade show active">
                        @if (count($courses) > 0)
                            @foreach ($courses as $course)
                                <!-- Courses Item Start -->
                                <div class="courses-item">
                                    <div class="item-thumb">
                                        <a href="#">
                                            <img src="{{asset('images/courses/admin-courses-01.jpg')}}" alt="Courses">
                                        </a>
                                    </div>

                                    <div class="content-title">
                                        <div class="meta">
                                            <a href="#" class="action">Live</a>
                                            <a href="#" class="action">Free</a>
                                            <a href="#" class="action">Public</a>
                                        </div>

                                        {{-- <div class="d-flex mb-0 align-items-center">
                                            <span class="count">Current Batch</span>
                                            <div class="meta ms-2">
                                                <a href="#" class="action">{{$course->total_batches}}</a>
                                            </div>
                                        </div> --}}
                                        <h3 class="title mt-0"><a href="/me/courses/{{$course->slug}}">{{$course->name}}</a></h3>
                                    </div>

                                    <div class="content-wrapper">
                                        <div class="content-box">
                                            <p>Earned</p>
                                            <span class="count">${{$course->earnings}}.00</span>
                                        </div>

                                        <div class="content-box">
                                            <p>Enrollments</p>
                                            <span class="count">{{$course->total_students}}</span>
                                        </div>

                                        <div class="content-box">
                                            <p>Course Rating</p>
                                            <span class="count">
                                                    {{$course->rating}}.0
                                                    <span class="rating-star">
                                                        <span class="rating-bar" style="width: {{$course->rating * 20 }}%;"></span>
                                            </span>
                                            </span>
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
