<x-mentor-course-detail :course="$course" :batches="$batches" :mentor="$mentor">
    <!-- Courses Rating Wrapper Start -->
    <div>
        <h5 class="mb-3">Class Reviews</h5>

        <div class="row">
            <div class="col-md-5">
                <div class="overview-box w-100 mt-0 flex-column">
                    <div class="single-box w-100 mb-2">
                        <h5 class="title">Mentor Rating</h5>
                        <div class="count">
                            {{$course->rating}}.0

                            <span class="rating-star">
                                    <span class="rating-bar" style="width: {{$course->rating * 20}}%;"></span>
                            </span>
                        </div>
                        <p><span>58</span> This months</p>
                    </div>

                    <div class="single-box w-100 mt-0">
                        <h5 class="title">Total Reviews</h5>
                        <div class="count">{{$course->total_students}}</div>
                        <p><span>345</span> This months</p>
                    </div>
                </div>
            </div>

            <div class="col-md-7 courses-details-tab my-0 py-0">
                <div class="details-tab-content  m-0 p-0">
                    <div class="tab-rating-box w-100 m-0">
                        <span class="count">4.8 <i class="icofont-star"></i></span>
                        <p>Rating (86K+)</p>

                        <div class="rating-box-wrapper">
                            <div class="single-rating">
                                <span class="rating-star">
                                        <span class="rating-bar" style="width: 100%;"></span>
                                </span>
                                <div class="rating-progress-bar">
                                    <div class="rating-line" style="width: 75%;"></div>
                                </div>
                            </div>

                            <div class="single-rating">
                                <span class="rating-star">
                                        <span class="rating-bar" style="width: 80%;"></span>
                                </span>
                                <div class="rating-progress-bar">
                                    <div class="rating-line" style="width: 90%;"></div>
                                </div>
                            </div>

                            <div class="single-rating">
                                <span class="rating-star">
                                        <span class="rating-bar" style="width: 60%;"></span>
                                </span>
                                <div class="rating-progress-bar">
                                    <div class="rating-line" style="width: 500%;"></div>
                                </div>
                            </div>

                            <div class="single-rating">
                                <span class="rating-star">
                                        <span class="rating-bar" style="width: 40%;"></span>
                                </span>
                                <div class="rating-progress-bar">
                                    <div class="rating-line" style="width: 80%;"></div>
                                </div>
                            </div>

                            <div class="single-rating">
                                <span class="rating-star">
                                        <span class="rating-bar" style="width: 20%;"></span>
                                </span>
                                <div class="rating-progress-bar">
                                    <div class="rating-line" style="width: 40%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="courses-rating-wrapper">

        <!-- Single Courses Rating Start -->
        <div class="single-courses-rating p-0 border-0">
            <!-- Rating Start -->
            <div class="rating">
                <div class="rating-author">
                    <img src="assets/images/author/author-12.jpg" alt="Author">
                </div>
                <div class="rating-content">
                    <h4 class="name">Natosha Sibley</h4>
                    <span class="date">Updated: March 28, 2021</span>

                    <div class="average-rating">
                        <span class="rating-star">
                                <span class="rating-bar" style="width: 80%;"></span>
                        </span>
                    </div>

                    <a href="#" class="btn">Respond</a>
                </div>
                <a class="waving" href="#"><i class="flaticon-waving-flag"></i></a>
            </div>
            <!-- Rating End -->

        </div>
        <!-- Single Courses Rating End -->

        <!-- Single Courses Rating Start -->
        <div class="single-courses-rating p-0 border-0">

            <!-- Rating Start -->
            <div class="rating">
                <div class="rating-author">
                    <img src="assets/images/author/author-13.jpg" alt="Author">
                </div>
                <div class="rating-content">
                    <h4 class="name">Clarine Sander</h4>
                    <span class="date">Updated: March 28, 2021</span>

                    <div class="average-rating">
                        <span class="rating-star">
                                <span class="rating-bar" style="width: 80%;"></span>
                        </span>
                    </div>

                    <a href="#" class="btn">Respond</a>
                </div>
                <a class="waving" href="#"><i class="flaticon-waving-flag"></i></a>
            </div>
            <!-- Rating End -->

        </div>
        <!-- Single Courses Rating End -->

        <!-- Single Courses Rating Start -->
        <div class="single-courses-rating p-0 border-0">
            <!-- Rating Start -->
            <div class="rating">
                <div class="rating-author">
                    <img src="assets/images/author/author-14.jpg" alt="Author">
                </div>
                <div class="rating-content">
                    <h4 class="name">Gaylene Klinger</h4>
                    <span class="date">Updated: March 28, 2021</span>

                    <div class="average-rating">
                        <span class="rating-star">
                                <span class="rating-bar" style="width: 80%;"></span>
                        </span>
                    </div>

                    <a href="#" class="btn">Respond</a>
                </div>
                <a class="waving" href="#"><i class="flaticon-waving-flag"></i></a>
            </div>
            <!-- Rating End -->

        </div>
        <!-- Single Courses Rating End -->

        <!-- Single Courses Rating Start -->
        <div class="single-courses-rating p-0 border-0">
            <!-- Rating Start -->
            <div class="rating">
                <div class="rating-author">
                    <img src="assets/images/author/author-15.jpg" alt="Author">
                </div>
                <div class="rating-content">
                    <h4 class="name">Shawnda Hinds</h4>
                    <span class="date">Updated: March 28, 2021</span>

                    <div class="average-rating">
                        <span class="rating-star">
                                <span class="rating-bar" style="width: 80%;"></span>
                        </span>
                    </div>

                    <a href="#" class="btn">Respond</a>
                </div>
                <a class="waving" href="#"><i class="flaticon-waving-flag"></i></a>
            </div>
            <!-- Rating End -->

        </div>
        <!-- Single Courses Rating End -->

    </div>
    <!-- Courses Rating Wrapper End -->
</x-mentor-course-detail>
