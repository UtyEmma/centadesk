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
                <h3 class="title">{{$course->name}}</h3>

                <div class="courses-tab-wrapper">
                    <div class="courses-select">
                        <select>
                            <option data-display="Newest First">Newest First</option>
                            <option value="1">Oldest First</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-7">
                    <div>
                        <h5 class="mb-3">Class Overview</h5>

                        <div class="overview-box mt-0">
                            <div class="single-box mt-0">
                                <h5 class="title">Total Earnings</h5>
                                <div class="count">${{$course->earnings}}</div>
                                <p><span>$235.00</span> This months</p>
                            </div>

                            <div class="single-box mt-0">
                                <h5 class="title">Total Enrollment’s</h5>
                                <div class="count">{{$course->total_students}}</div>
                                <p><span>345</span> This months</p>
                            </div>

                            <div class="single-box mt-0">
                                <h5 class="title">Mentor Rating</h5>
                                <div class="count">
                                    {{$course->rating}}.0

                                    <span class="rating-star">
                                            <span class="rating-bar" style="width: {{$course->rating * 20}}%;"></span>
                                    </span>
                                </div>
                                <p><span>58</span> This months</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <h5 class="mb-3">Course Info</h5>

                        <div class="card radius">
                            <div class="card-body">
                                <div class="courses-details my-0">
                                    <div class="courses-details-images">
                                        <img src="{{asset('images/courses/courses-details.jpg')}}" alt="Courses Details">
                                        <span class="tags">Finance</span>

                                        <div class="courses-play">
                                            <img src="{{asset('images/courses/circle-shape.png')}}" alt="Play">
                                            <a class="play video-popup" href="{{$course->video}}"><i class="flaticon-play"></i></a>
                                        </div>
                                    </div>

                                    <div class="courses-details-admin">
                                        <div class="description-wrapper">
                                            <h5 class="mb-0">Description</h5>
                                            <p class="mt-0">
                                                {!! $course->desc !!}
                                            </p>
                                        </div>
                                    </div>

                                    <div>
                                        Tags

                                        {{$course->tags}}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-5">

                    <div class="radius border p-3">
                        <h6 class="mb-2">Course Batches</h6>

                        @foreach ($batches as $batch)
                            <div class="card radius p-3 border mb-2">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <a href="/me/courses/{{$course->slug}}/{{$batch->short_code}}" class="title fw-bold" >{{$batch->title}}</a> <br/>
                                        <small>
                                            {{$batch->startdate}} - {{$batch->enddate}}
                                        </small>
                                    </div>

                                    <div>
                                        <button class="btn"><i class="fa-regular fa-clone"></i></button>
                                        <button class="btn"><i class="fa-regular fa-share-nodes"></i></button>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>

    </div>
</x-app-layout>
