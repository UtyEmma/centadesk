<x-mentor-batch-detail :course="$course" :mentor="$mentor" :batch="$batch" :batches="$batches">
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
    </div>

    <div class="courses-details my-0">
        <div class="courses-details-images">
            <img src="{{json_decode($batch->images)[0] ?? asset('images/courses/courses-details.jpg')}}" alt="Courses Details">
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
        <div class="overview-box mt-0">
            <div class="single-box mb-2">
                <h5 class="title">Batch Price</h5>
                <div class="count fs-5">
                    {{$batch->currency}} {{number_format($batch->price)}}
                </div>
            </div>
            <div class="single-box mb-2">
                <h5 class="title">Batch Earnings</h5>
                <div class="count">
                    {{$course->rating}}.0
                </div>
            </div>
        </div>
    </div>
    <!-- Student's Wrapper End -->



    <div class="text-center mt-2">
        <a href="{{$batch->short_code}}/students" class="btn btn-primary btn-hover-dark">Batch Students</a>
    </div>

</x-mentor-batch-detail>
