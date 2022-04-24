<x-mentor-course-detail :course="$course" :batches="$batches" :mentor="$mentor" title="Batch">

     <!-- Admin Courses Tab Start -->
     <div >
         <div class="d-flex justify-content-between align-items-center mb-0 mt-0">
             <h5>{{$batch->title}}</h5>

             <div class="mb-0">
                 <span>{{env('MAIN_APP_DOMAIN')}}/{{$batch->short_code}}</span>
                 <button class="btn p-0"><i class="icofont-ui-copy"></i></button>
                 <button class="btn p-0"><i class="icofont-share"></i></button>
             </div>
         </div>

        <div class="overview-box mt-0">
            <div class="single-box mb-2">
                <h5 class="title">Enrolled Students</h5>
                <div class="count">
                    {{$course->rating}}.0
                </div>
                <p><span>58</span> This months</p>
            </div>
            <div class="single-box mb-2">
                <h5 class="title">Enrolled Students</h5>
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

</x-mentor-course-detail>
