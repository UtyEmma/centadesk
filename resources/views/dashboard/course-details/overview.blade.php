<x-mentor-course-detail :course="$course" :batches="$batches" :mentor="$mentor" title="Course Batches">
    <div class="overview-box mt-0">
        <div class="single-box mb-2">
            <h5 class="title">Enrolled Students</h5>
            <div class="count">
                {{$course->total_students}}
            </div>
            <p><span>58</span> This months</p>
        </div>
        <div class="single-box mb-2">
            <h5 class="title">Batch Earnings</h5>
            <div class="count">
                {{$course->rating}}.0

                <span class="rating-star">
                        <span class="rating-bar" style="width: {{$course->rating * 20}}%;"></span>
                </span>
            </div>
            <p><span>58</span> This months</p>
        </div>
        <div class="single-box mb-2">
            <h5 class="title">Batch Earnings</h5>
            <div class="count">
                {{$course->rating}}.0

                <span class="rating-star">
                        <span class="rating-bar" style="width: {{$course->rating * 20}}%;"></span>
                </span>
            </div>
            <p><span>58</span> This months</p>
        </div>
    </div>

    <div class="admin-courses-tab d-flex align-items-center">
        <h4 class="mb-0">Course Batches</h4>

        <div class="courses-tab-wrapper">
            <div class="tab-btn py-0">
                <a href="{{$course->slug}}/batch/new" class="btn btn-primary btn-hover-dark">New Batch</a>
            </div>
        </div>
    </div>
    <!-- Admin Courses Tab End -->


    <div class="mt-4">
            @forelse ($batches as $batch)
                <div class="courses-item mt-2">
                    <div class="item-thumb col-md-2">
                        <a href="/me/courses/{{$course->slug}}/edit">
                            <img src="{{$batch->images && json_decode($batch->images)[0]}}" alt="Courses">
                        </a>
                    </div>

                    <div class="content-title">
                        <div class="meta">
                            <a href="#" class="lh-0 action text-capitalize">{{$batch->status}}</a>
                            <a href="#" class="lh-0 action">{{$batch->price > 0 ? 'Paid' : 'Free'}}</a>
                            <a href="#" class="action text-capitalize">{{$batch->discount !== 'none' ? 'Discounted' : 'No Discount'}}</a>
                        </div>

                        <h3 class="title mt-0 mb-2">
                            <a class="mt-1" href="/me/courses/{{$course->slug}}/{{$batch->short_code}}">{{$batch->title}}</a>
                        </h3>

                        <x-batch-share :batch="$batch" />
                    </div>

                    <div class="content-wrapper">
                        <a href="{{$course->slug}}/{{$batch->short_code}}">
                            <x-btn classes="btn-secondary btn-hover-primary">View Details</x-btn>
                        </a>
                        <div class="dropdown">
                            <button class="btn btn-primary btn-hover-dark dropdown-toggle  px-4 border-0 rounded-full" style="font-size: 14px; line-height: 3.5;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                              Options
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <li><a class="dropdown-item" href="{{$course->slug}}/{{$batch->short_code}}/edit">Edit</a></li>
                              <li><a class="dropdown-item" href="{{$course->slug}}/{{$batch->short_code}}">Details</a></li>
                              <li><a class="dropdown-item" href="/courses/{{$course->slug}}/{{$batch->short_code}}">Preview</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item" href="{{$course->slug}}/{{$batch->short_code}}/cancel">Cancel</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            @empty

            @endforelse

        </div>
    </div>

</x-mentor-course-detail>
