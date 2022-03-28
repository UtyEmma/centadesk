<x-mentor-batch-detail :course="$course" :mentor="$mentor" :batch="$batch" :batches="$batches">
    <div class="courses-details my-0">
        <div class="courses-details-images">
            <img src="{{asset('images/courses/courses-details.jpg')}}" alt="Courses Details">
            <span class="tags">Finance</span>

            <div class="courses-play">
                <img src="{{asset('images/courses/circle-shape.png')}}" alt="Play">
                <a class="play video-popup" href="{{$course->video}}"><i class="flaticon-play"></i></a>
            </div>
        </div>

        <div class="mt-2">
            <x-tags :element="'tags'" :tags="$course->tags"  />
        </div>
    </div>

    <!-- Student's Wrapper Start -->
    <div class="students-wrapper students-active" id="blade-students-slider">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <!-- Single Student Start -->
                    <div class="single-student">
                        <div class="student-images">
                            <img src="{{asset('images/author/author-01.jpg')}}" alt="Author">
                        </div>
                        <div class="student-content">
                            <h5 class="name">Margarita James</h5>
                            <span class="country"><img src="{{asset('   ')}}" alt="Flog"> Brazil</span>
                            <p>Data Science and Machine learning</p>
                            <span class="date"><i class="icofont-ui-calendar"></i> 28.03.2021</span>
                        </div>
                    </div>
                    <!-- Single Student End -->
                </div>
                <div class="swiper-slide">
                    <!-- Single Student Start -->
                    <div class="single-student">
                        <div class="student-images">
                            <img src="assets/images/author/author-02.jpg" alt="Author">
                        </div>
                        <div class="student-content">
                            <h5 class="name">Stanley Castro</h5>
                            <span class="country"><img src="assets/images/flag/flag-1.png" alt="Flog"> Brazil</span>
                            <p>Data Science and Machine learning</p>
                            <span class="date"><i class="icofont-ui-calendar"></i> 28.03.2021</span>
                        </div>
                    </div>
                    <!-- Single Student End -->
                </div>
                <div class="swiper-slide">
                    <!-- Single Student Start -->
                    <div class="single-student">
                        <div class="student-images">
                            <img src="assets/images/author/author-07.jpg" alt="Author">
                        </div>
                        <div class="student-content">
                            <h5 class="name">Beatrice Summers</h5>
                            <span class="country"><img src="assets/images/flag/flag-1.png" alt="Flog"> Brazil</span>
                            <p>Data Science and Machine learning</p>
                            <span class="date"><i class="icofont-ui-calendar"></i> 28.03.2021</span>
                        </div>
                    </div>
                    <!-- Single Student End -->
                </div>
                <div class="swiper-slide">
                    <!-- Single Student Start -->
                    <div class="single-student">
                        <div class="student-images">
                            <img src="assets/images/author/author-08.jpg" alt="Author">
                        </div>
                        <div class="student-content">
                            <h5 class="name">Beatrice Summers</h5>
                            <span class="country"><img src="assets/images/flag/flag-1.png" alt="Flog"> Brazil</span>
                            <p>Data Science and Machine learning</p>
                            <span class="date"><i class="icofont-ui-calendar"></i> 28.03.2021</span>
                        </div>
                    </div>
                    <!-- Single Student End -->
                </div>
                <div class="swiper-slide">
                    <!-- Single Student Start -->
                    <div class="single-student">
                        <div class="student-images">
                            <img src="assets/images/author/author-09.jpg" alt="Author">
                        </div>
                        <div class="student-content">
                            <h5 class="name">Beatrice Summers</h5>
                            <span class="country"><img src="assets/images/flag/flag-1.png" alt="Flog"> Brazil</span>
                            <p>Data Science and Machine learning</p>
                            <span class="date"><i class="icofont-ui-calendar"></i> 28.03.2021</span>
                        </div>
                    </div>
                    <!-- Single Student End -->
                </div>
            </div>

            <div class="students-arrow">
                <!-- Add Pagination -->
                <div class="swiper-button-prev"><i class="icofont-rounded-left"></i></div>
                <div class="swiper-button-next"><i class="icofont-rounded-right"></i></div>
            </div>
        </div>
    </div>
    <!-- Student's Wrapper End -->

    <div class="text-center mt-2">
        <a href="{{$batch->short_code}}/students" class="btn btn-primary btn-hover-dark">Batch Students</a>
    </div>

</x-mentor-batch-detail>
