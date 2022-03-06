<x-app-layout>
    <!-- Page Content Wrapper Start -->
    <div class="page-content-wrapper">
        <div class="container-fluid custom-container">

            <!-- Message Start -->
            <div class="message">
                <div class="message-icon">
                    <img src="assets/images/menu-icon/icon-6.png" alt="">
                </div>
                <div class="message-content">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic.</p>
                </div>
            </div>
            <!-- Message End -->

            <!-- Admin Courses Tab Start -->
            <div class="admin-courses-tab">
                <h3 class="title">Courses</h3>

                <div class="courses-tab-wrapper">
                    <div class="courses-select">
                        <select>
                            <option data-display="Newest First">Newest First</option>
                            <option value="1">Oldest First</option>
                        </select>
                    </div>

                    <div class="courses-select">
                        <select class="">
                            <option data-display="This Month">This Month</option>
                            <option value="1">This Year</option>
                            <option value="2">This Week</option>
                        </select>
                    </div>

                    <ul class="nav">
                        <li><button class="active" data-bs-toggle="tab" data-bs-target="#tab1"><i class="icofont-justify-left"></i></button></li>
                        <li><button data-bs-toggle="tab" data-bs-target="#tab2"><i class="icofont-align-left"></i></button></li>
                        <li><button data-bs-toggle="tab" data-bs-target="#tab3"><i class="icofont-eye-blocked"></i></button></li>
                    </ul>
                    <div class="tab-btn">
                        <a href="/me/courses/create" class="btn btn-primary btn-hover-dark">New Course</a>
                    </div>
                </div>
            </div>
            <!-- Admin Courses Tab End -->

            <!-- Admin Courses Tab Content Start -->
            <div class="admin-courses-tab-content">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab1">

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
                    </div>
                    <div class="tab-pane fade" id="tab2">
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
                                    <h3 class="title"><a href="#">{{$course->name}}</a></h3>

                                    <div class="content-box">
                                        <p>Batches <span class="count">{{$course->total_batches}}</span></p>
                                    </div>
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
                    </div>
                    <div class="tab-pane fade" id="tab3">
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
                                    <h3 class="title"><a href="#">{{$course->name}}</a></h3>

                                    <div class="content-box">
                                        <p>Batches <span class="count">{{$course->total_batches}}</span></p>
                                    </div>
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
                    </div>
                </div>
            </div>
            <!-- Admin Courses Tab Content End -->

            <!-- Courses Resources Start -->
            <div class="courses-resources">
                <h4 class="title">Here are our most popular instructor resources.</h4>

                <!-- Resources Wrapper Start -->
                <div class="resources-wrapper">
                    <div class="row row-cols-xl-6 row-cols-md-3 row-cols-2">
                        <div class="col">

                            <!-- Single Resources Start -->
                            <div class="single-resources">
                                <div class="resources-icon">
                                    <a href="#">
                                        <img src="{{asset('images/resources-icon/icon-1-1.png')}}" alt="Icon">
                                        <img class="hover" src="{{asset('images/resources-icon/icon-2-1.png')}}" alt="Icon">
                                    </a>
                                </div>
                                <h5 class="title"><a href="#">Test Video</a></h5>
                            </div>
                            <!-- Single Resources Start -->

                        </div>
                        <div class="col">

                            <!-- Single Resources Start -->
                            <div class="single-resources">
                                <div class="resources-icon">
                                    <a href="#">
                                        <img src="{{asset('images/resources-icon/icon-1-2.png')}}" alt="Icon">
                                        <img class="hover" src="{{asset('images/resources-icon/icon-2-2.png')}}" alt="Icon">
                                    </a>
                                </div>
                                <h5 class="title"><a href="#">Community</a></h5>
                            </div>
                            <!-- Single Resources Start -->

                        </div>
                        <div class="col">

                            <!-- Single Resources Start -->
                            <div class="single-resources">
                                <div class="resources-icon">
                                    <a href="#">
                                        <img src="{{asset('images/resources-icon/icon-1-3.png')}}" alt="Icon">
                                        <img class="hover" src="{{asset('images/resources-icon/icon-2-3.png')}}" alt="Icon">
                                    </a>
                                </div>
                                <h5 class="title"><a href="#">Teaching Center</a></h5>
                            </div>
                            <!-- Single Resources Start -->

                        </div>
                        <div class="col">

                            <!-- Single Resources Start -->
                            <div class="single-resources">
                                <div class="resources-icon">
                                    <a href="#">
                                        <img src="{{asset('images/resources-icon/icon-1-4.png')}}" alt="Icon">
                                        <img class="hover" src="{{asset('images/resources-icon/icon-2-4.png')}}" alt="Icon">
                                    </a>
                                </div>
                                <h5 class="title"><a href="#">Insight Courses</a></h5>
                            </div>
                            <!-- Single Resources Start -->

                        </div>
                        <div class="col">

                            <!-- Single Resources Start -->
                            <div class="single-resources">
                                <div class="resources-icon">
                                    <a href="#">
                                        <img src="{{asset('images/resources-icon/icon-1-5.png')}}" alt="Icon">
                                        <img class="hover" src="{{asset('images/resources-icon/icon-2-5.png')}}" alt="Icon">
                                    </a>
                                </div>
                                <h5 class="title"><a href="#">Help & Support</a></h5>
                            </div>
                            <!-- Single Resources Start -->

                        </div>
                        <div class="col">

                            <!-- Single Resources Start -->
                            <div class="single-resources">
                                <div class="resources-icon">
                                    <a href="#">
                                        <img src="{{asset('images/resources-icon/icon-1-6.png')}}" alt="Icon">
                                        <img class="hover" src="{{asset('images/resources-icon/icon-2-6.png')}}" alt="Icon">
                                    </a>
                                </div>
                                <h5 class="title"><a href="#">Insight Courses</a></h5>
                            </div>
                            <!-- Single Resources Start -->

                        </div>
                    </div>
                </div>
                <!-- Resources Wrapper End -->

            </div>
            <!-- Courses Resources End -->

        </div>
    </div>
    <!-- Page Content Wrapper End -->
</x-app-layout>
