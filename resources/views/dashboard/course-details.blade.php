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

                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-5">
                    <h5 class="mb-3">Batches</h5>

                    @foreach ($batches as $batch)
                        <div class="card radius  p-3 mb-2">
                            <div class="row">
                            </div>
                            <h5 class="title">Mentor Rating</h5>
                            <div class="count">
                                Duration
                                {{$batch->duration}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>
</x-app-layout>
