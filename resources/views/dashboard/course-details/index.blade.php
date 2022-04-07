<x-app-layout>

    <!-- Page Content Wrapper Start -->
    <div class="page-content-wrapper">
        <div class="container-fluid custom-container">

            <!-- Admin Courses Tab Start -->
            <div class="admin-courses-tab mt-0 w-100">
                <div class="w-100 d-flex justify-content-between align-items-top">
                    <div>
                        <h3 class="mb-0 lh-0">{{$course->name}}</h3>
                        <h5 class="mt-1 lh-0">{{$title}}</h5>
                    </div>

                    <div>
                        <ul class="nav justify-content-md-end align-items-center h-100">
                            <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="/me/courses/{{$course->slug}}">Overview</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="{{$course->slug}}/students">Students</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="{{$course->slug}}/reviews">Reviews</a>
                            </li>
                            <li class="nav-item reviews-btn">
                              <a class="nav-link btn btn-outline-primary py-0 border border-primary fw-normal lh-3" href="{{$course->slug}}/batch/new">New Batch</a>
                            </li>
                          </ul>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-7 ">
                    {{$slot}}
                </div>

                <div class="col-md-5">
                    <div class="courses-video-playlist w-100 radius">
                        <div class="playlist-title py-4 radius-top">
                            <h5 class="lh-0 my-0">Course Batches</h5>
                        </div>

                        <!-- Video Playlist Start  -->
                        <div class="video-playlist radius-bottom p-3 px-5">
                            @foreach ($batches as $batch)
                                <x-batch.item :batch="$batch" :course="$course" />
                            @endforeach
                        </div>
                    </div>
                    {{-- <div class="ps-3">
                        <h6 class="mb-2">Course Batches</h6>

                    </div> --}}
                </div>
            </div>

        </div>

    </div>
</x-app-layout>
