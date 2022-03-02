<x-app-layout>
    <!-- Page Content Wrapper Start -->
    <div class="main-content-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-7">
                    <div>
                        <h5 class="mb-3">Account Overview</h5>

                        <div class="overview-box mt-0">
                            <div class="single-box mt-0">
                                <h5 class="title">Total Revenue</h5>
                                <div class="count">$568.00</div>
                                <p><span>$235.00</span> This months</p>
                            </div>

                            <div class="single-box mt-0">
                                <h5 class="title">Total Enrollment’s</h5>
                                <div class="count">2,570</div>
                                <p><span>345</span> This months</p>
                            </div>

                            <div class="single-box mt-0">
                                <h5 class="title">Mentor Rating</h5>
                                <div class="count">
                                    4.5

                                    <span class="rating-star">
                                            <span class="rating-bar" style="width: 80%;"></span>
                                    </span>
                                </div>
                                <p><span>58</span> This months</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 new-courses px-8 mt-0" style="background-image: url({{asset('images/new-courses-banner.jpg')}});">
                    <div class="row">
                        <div class="new-courses-title">
                            <h3 class="title">Your students want to learn more. <br> Consider creating new courses to meet that demand.</h3>
                        </div>

                        <div class="new-courses-btn mt-6">
                            <a href="/courses/create" class="btn">Create a new Course<i class="icofont-rounded-right"></i></a>
                        </div>
                    </div>
                    {{-- <img class="shape d-none d-xl-block" src="{{asset('images/shape/shape-27.png')}}" alt="Shape"> --}}
                </div>
            </div>
            <!-- Overview Top Start -->
            <div class="admin-top-bar flex-wrap">

                <div class="courses-select">
                    <select>
                        <option data-display="All Courses">All Courses</option>
                        <option value="1">option</option>
                        <option value="2">option</option>
                        <option value="3">option</option>
                        <option value="4">Potato</option>
                    </select>
                </div>
            </div>
            <!-- Overview Top End -->

            <!-- Graph Top Start -->
            <div class="graph">
                <div class="graph-title">
                    <h4 class="title">Get top insights about your performance</h4>

                    <div class="months-select">
                        <select>
                            <option data-display="Last 12 months">Last 12 months</option>
                            <option value="1">Last 6 months</option>
                            <option value="1">Last 3 months</option>
                            <option value="1">Last 2 months</option>
                            <option value="1">Last 1 months</option>
                            <option value="1">Last 1 week</option>
                        </select>
                    </div>
                </div>

                <div class="graph-content">
                    <div id="uniqueReport"></div>
                </div>

                <div class="graph-btn">
                    <a class="btn btn-primary btn-hover-dark" href="#">Revenue Report <i class="icofont-rounded-down"></i></a>
                </div>
            </div>
            <!-- Graph Top End -->

        </div>
    </div>
    <!-- Page Content Wrapper End -->
</x-app-layout>
