<x-enrolled-course :course="$course" :batch="$batch" :messages="$forum" :mentor="$mentor" :user="$user" :enrollment="$enrollment" :report="$report">

        <!-- Courses Enroll Tab Content Start -->
        <div class="courses-enroll-tab-content">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab1">

                    <!-- Overview Start -->
                    <div class="overview">
                        <div class="enroll-tab-title">
                            <h3 class="title">Course Details</h3>
                        </div>
                        <div class="enroll-tab-content">
                            {!! $course->desc !!}

                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Instructor <span>:</span></th>
                                        <td>{{$mentor->firstname}} {{$mentor->lastname}}</td>
                                    </tr>
                                    <tr>
                                        <th>Duration <span>:</span></th>
                                        <td>08 hr 15 mins</td>
                                    </tr>
                                    <tr>
                                        <th>Lectures <span>:</span></th>
                                        <td>2,16</td>
                                    </tr>
                                    <tr>
                                        <th>Level <span>:</span></th>
                                        <td>Secondary</td>
                                    </tr>
                                    <tr>
                                        <th>Language <span>:</span></th>
                                        <td>English</td>
                                    </tr>
                                    <tr>
                                        <th>Caption’s <span>:</span></th>
                                        <td>Yes</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Overview End -->

                </div>

                <x-courses.review-tab :reviews="$reviews" :batch="$batch" :can="true" />

                <div class="tab-pane fade" id="tab3">
                    <!-- Instructor Start -->
                    <div class="instructor">
                        <div class="enroll-tab-title">
                            <h3 class="title">Instructor</h3>
                        </div>

                        <div class="enroll-tab-content p-0">
                            <!-- Single Instructor Start -->
                            <div class="single-instructor">
                                <div class="review-author">
                                    <div class="single-team">
                                        <div class="team-thumb ratio ratio-1x1" style="position: relative; width: 150px; ">
                                            <img src="{{$mentor->avatar ?? asset('images/author/author-04.jpg')}}" class="ratio ratio-1x1 img-cover" alt="Author">
                                        </div>
                                    </div>
                                    <div class="author-content text-left">
                                        <h4 class="name">{{$mentor->firstname}} {{$mentor->lastname}}</h4>
                                        <span class="designation">{{$mentor->specialty}}</span>
                                        <span class="rating-star">
                                                <span class="rating-bar" style="width: 80%;"></span>
                                        </span>
                                    </div>
                                </div>
                                <p>{{$mentor->desc}}</p>
                            </div>
                            <!-- Single Instructor End -->

                        </div>
                    </div>
                    <!-- Instructor End -->

                </div>
            </div>
        </div>
        <!-- Courses Enroll Tab Content End -->




    <!-- Courses Enroll Content End -->

</x-enrolled-course>
