<x-mentor-batch-detail :course="$course" :mentor="$mentor" :batch="$batch">
    <!-- Student Top Start -->
    <div class="admin-top-bar students-top">
        <div class="courses-select pt-0">
            <h4 class="title">Meet people taking your courses</h4>
        </div>
    </div>
    <!-- Student Top End -->

    <!-- Engagement Courses Start -->
    <div class="engagement-courses pt-0 mt-3">

        <div class="courses-top">
            <ul>
                <li>Student</li>
                <li>Enrollment Date</li>
                {{-- <li>Active Student’s</li> --}}
            </ul>
        </div>

        <div class="courses-list">
            <ul>
                @forelse ($students as $student)
                    <li>
                        <div class="courses">
                            <div class="thumb">
                                <img src="assets/images/courses/admin-courses-01.jpg" alt="Courses">
                            </div>
                            <div class="content">
                                <h4 class="title">{{$student->firstname}} {{$student->lastname}}</h4>
                            </div>
                        </div>
                        <div class="taught">
                            <span>{{$student->enrolled_at}}</span>
                        </div>
                        {{-- <div class="student">
                            <span>{{$student->}}</span>
                        </div>
                        <div class="button">
                            <a class="btn" href="#">View Details</a>
                        </div> --}}
                    </li>
                @empty
                    <div class="bg-light p-5 text-center radius mt-5">
                        <h3>No Student has enrolled for this batch yet!</h3>
                    </div>
                @endforelse
            </ul>
        </div>

    </div>
    <!-- Engagement Courses End -->


</x-mentor-batch-detail>
