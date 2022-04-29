<x-app-layout>

    <!-- Page Content Wrapper Start -->
    <div class="page-content-wrapper">
        <div class="container-fluid custom-container">
            <!-- Admin Courses Tab Start -->
            {{-- <div class="admin-courses-tab mt-0 w-100">
                <div class="w-100 d-md-flex justify-content-between">
                    <div>
                        <h3 class="mb-1">{{$course->name}}</h3>
                        <h4>{{$batch->title}}</h4>
                    </div>

                    <div class="mt-2 mt-md-0">
                        <x-batch-share :batch="$batch" />
                    </div>
                </div>
            </div> --}}

            {{-- <div class="courses-details-tab">
                <div class="details-tab-menu">
                    <ul class="nav">
                        <li >
                            <a href="/me/courses/{{$course->slug}}/{{$batch->short_code}}">
                                <button class="{{request()->routeIs('mentor_batch') ? 'active' : ''}}">Overview</button>
                            </a>
                        </li>
                        <li >
                            <a href="/me/courses/{{$course->slug}}/{{$batch->short_code}}/students">
                                <button class="{{request()->routeIs('mentor_batch_students') ? 'active' : ''}}">Students</button>
                            </a>
                        </li>
                        <li>
                            <a href="/me/courses/{{$course->slug}}/{{$batch->short_code}}/forum">
                                <button class="{{request()->routeIs('mentor_batch_forum') ? 'active' : ''}}">Forum</button>
                            </a>
                        </li>
                        <li>
                            <a href="/me/courses/{{$course->slug}}/{{$batch->short_code}}/edit">
                                <button class="{{request()->routeIs('mentor_batch_edit') ? 'active' : ''}}">Edit</button>
                            </a>
                        </li>
                    </ul>
                </div>
            </div> --}}

            {{$slot}}

            <x-new-course />
        </div>
   </div>

</x-app-layout>
