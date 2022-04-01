<x-app-layout>
    <div class="my-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    <div>
                        <h5 class="mb-3">Account Overview</h5>

                        <div class="overview-box mt-0">
                            <div class="single-box mt-0 px-3">
                                <h5 class="title">Revenue</h5>
                                <div class="count">&#8358; {{$user->earnings}}</div>
                                <p><span>$235.00</span> This months</p>
                            </div>

                            <div class="single-box mt-0 px-3">
                                <h5 class="title">Enrollments</h5>
                                <div class="count">{{$enrollments}}</div>
                                <p><span>345</span> This months</p>
                            </div>

                            <div class="single-box mt-0 px-3">
                                <h5 class="title">Rating</h5>
                                <div class="count">
                                    {{$user->avg_rating}}.0

                                    <span class="rating-star">
                                            <span class="rating-bar" style="width: {{$user->avg_rating * 20}}%;"></span>
                                    </span>
                                </div>
                                <p><span>58</span> This months</p>
                            </div>
                        </div>
                    </div>
                </div>

                @if ($user->kyc_status === 'pending')
                    <div class="col-md-5 new-courses px-8 mt-0" style="background-image: url({{asset('images/new-courses-banner.jpg')}});">
                        <div class="row">
                            <div class="new-courses-title">
                                <h3 class="title">Your Mentor account is under review. <br> You will be able to start creating courses after your account is approved.</h3>
                                <p class="text-white">This should take between a few hours to a few days.</p>
                            </div>
                        </div>
                    </div>
                @elseif ($user->kyc_status === 'approved')
                    <div class="col-md-5 new-courses px-8 mt-0" style="background-image: url({{asset('images/new-courses-banner.jpg')}});">
                        <div class="row">
                            <div class="new-courses-title">
                                <h3 class="title">Your students want to learn more. <br> Consider creating new courses to meet that demand.</h3>
                            </div>

                            <div class="new-courses-btn mt-6">
                                <a href="/me/courses/create" class="btn">Create a new Course<i class="icofont-rounded-right"></i></a>
                            </div>
                        </div>
                        {{-- <img class="shape d-none d-xl-block" src="{{asset('images/shape/shape-27.png')}}" alt="Shape"> --}}
                    </div>
                @endif
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

            <x-course-resources />
        </div>
    </div>
</x-app-layout>
