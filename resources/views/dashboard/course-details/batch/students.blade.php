<x-mentor-batch-detail :course="$course" :mentor="$mentor" :batch="$batch" :batches="$batches">
    <!-- Student Top Start -->
    <div class="admin-top-bar students-top">
        <div class="courses-select">
            <h4 class="title">Meet people taking your courses</h4>
        </div>
    </div>
    <!-- Student Top End -->

    <!-- Engagement Courses End -->
    <div class="mt-3">
        <table class="table table-responsive">
            <thead >
                <th>Student</th>
                <th>Date Enrolled</th>
                <th></th>
            </thead>

            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{$student->firstname}} {{$student->lastname}}</td>
                        <td>{{$student->enrolled_at}}</td>
                        <td><a class="" href="#">View Details</a></td>
                    </tr>
                @endforeach
                <tr>
                    <td>Firstname Lastname</td>
                    <td>25th July 2021</td>
                    <td><a class="" href="#">View Details</a></td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- Engagement Courses End -->
</x-mentor-batch-detail>
