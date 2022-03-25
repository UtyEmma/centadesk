<!-- Courses Enroll Content Start -->
<div class="courses-enroll-content px-0">

    <!-- Courses Enroll Title Start -->
    <div class="courses-enroll-title">
        <div>
            <h2 class="title mb-0">{{$course->name}}</h2>
            <p class="mt-0">
                <i class="icofont-eye-alt"></i>
                <span>8,350</span> Students
            </p>
        </div>

        <div>
            <p class="mb-0 text-end">Current Batch</p>
            <h5 class="text-end">{{$batch->title}}</h5>
        </div>
    </div>
    <!-- Courses Enroll Title End -->

    <!-- Courses Enroll Tab Start -->
    <div class="courses-enroll-tab">
        <div class="enroll-tab-menu">
            <ul class="nav">
                <li><button class="active" data-bs-toggle="tab" data-bs-target="#tab1">Overview</button></li>
                <li><button data-bs-toggle="tab" data-bs-target="#tab2">Forum</button></li>
            </ul>
        </div>
        <div class="enroll-share">
            <a href="#"><i class="icofont-share-alt"></i> Share</a>
        </div>
    </div>
    <!-- Courses Enroll Tab End -->

    <!-- Courses Enroll Tab Content Start -->
    <div class="courses-enroll-tab-content">
        <div class="tab-content">
            <div class="tab-pane fade show active" id="tab1">
                <!-- Overview Start -->
                <div class="overview">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="enroll-tab-title">
                                <h3 class="title">Course Details</h3>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="enroll-tab-content py-0 mb-0">
                                <p class="mb-0">{!! $course->desc !!}</p>

                                <table class="table mt-0">
                                    <tbody>
                                        <tr>
                                            <th>Instructor <span>:</span></th>
                                            <td>{{$mentor->firstname}} {{$mentor->lastname}}</td>
                                        </tr>
                                        <tr>
                                            <th>Current Batch <span>:</span></th>
                                            <td>{{$batch->title}}</td>
                                        </tr>
                                        <tr>
                                            <th>Batch Begins <span>:</span></th>
                                            <td>{{$batch->startdate}}</td>
                                        </tr>
                                        <tr>
                                            <th>Batch Ends <span>:</span></th>
                                            <td>{{$batch->enddate}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Overview End -->

            </div>
            <div class="tab-pane fade" id="tab2">

                <!-- Certificates Start -->
                <div class="certificates">
                    <div class="row">
                        <x-batch.forum :messages="$forum" :user="$user" :batch="$batch" />
                    </div>
                </div>
                <!-- Certificates End -->

            </div>
        </div>
    </div>
    <!-- Courses Enroll Tab Content End -->

</div>
<!-- Courses Enroll Content End -->
