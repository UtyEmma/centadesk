<x-app-layout>

        <!-- Page Content Wrapper Start -->
        <div class="page-content-wrapper">
            <div class="container-fluid custom-container">

                <!-- Admin Courses Tab Start -->
                <div class="admin-courses-tab w-100 d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="title">{{$course->name}}</h3>
                        <h5>{{$batch->title}}</h5>
                    </div>

                    <div class="d-flex align-items-center ">
                        <p>{{env('MAIN_APP_DOMAIN')}}/{{$batch->short_code}}</p>
                        <button class="btn p-0"><i class="icofont-ui-copy"></i></button>
                        <button class="btn p-0"><i class="icofont-share"></i></button>
                    </div>
                </div>

                <div>

                    <!-- Admin Top Bar Start -->
                    <div class="admin-top-bar flex-wrap">

                        <div class="top-bar-filter">
                            <ul class="filter-check">
                                <li>
                                    <input type="checkbox" id="unread">
                                    <label for="unread"><span></span> Unread (2)</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="answer1">
                                    <label for="answer1"><span></span> No Top Answer</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="answer2">
                                    <label for="answer2"><span></span> No Answer</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="answer3">
                                    <label for="answer3"><span></span> No Instructor Answer</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Admin Top Bar End -->

                    <x-batch-forum :messages="$messages" ></x-batch-forum>


                </div>

            </div>
        </div>
</x-app-layout>
