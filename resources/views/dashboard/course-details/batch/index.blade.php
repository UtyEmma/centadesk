<x-mentor-course-detail :course="$course" :batches="$batches" :mentor="$mentor">

    <!-- Admin Courses Tab Start -->
    <div >
        <div style="background-color: #def2e6;" class="d-flex radius p-3 justify-content-between align-items-center">
            <div>
                <h6 class="lh-0 mb-0">Batch</h6>
                <h4>{{$batch->title}}</h4>
            </div>

            <div class="mb-0 ">
                <div class="d-flex align-items-center">
                    <small class="mb-0 me-3 fw-bold">{{env('MAIN_APP_DOMAIN')}}/{{$batch->short_code}}</small>
                    <div>
                        <button class="p-0 ml-2 mr-1 bg-transparent border-0 outline-0"><i class="icofont-ui-copy"></i></button>
                        <button class="p-0 mx-1 bg-transparent border-0 outline-0"><i class="icofont-share"></i></button>
                    </div>
                </div>

                <div class="text-end mt-2 w-100">
                    <a href="forum" class="">Batch Forum</a>
                </div>
            </div>
        </div>

        {{$slot}}
   </div>

</x-mentor-course-detail>
