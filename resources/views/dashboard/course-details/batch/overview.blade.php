<x-mentor-batch-detail :course="$course" :mentor="$mentor" :batch="$batch">
    <x-page-title title="Mentor Dashboard - {{$batch->title}}" />
    <div class="admin-top-bar students-top">
        <div class="courses-select pt-0">
            <h5 class="mb-0">Meet the people joining this Session</h5>
        </div>
    </div>
    <div class="engagement-courses  pt-0 mt-3">
        <div class="p-3 radius bg-secondary">
            <ul class="d-flex justify-content-around">
                <li><h6>Student</h6></li>
                <li><h6>Amount Paid</h6></li>
                <li><h6>Enrollment Date</h6></li>
            </ul>
        </div>

        <div class="courses-list mt-2">
            <ul>
                @forelse ($students as $student)
                    <li class="d-flex justify-content-around">
                        <div class="courses">
                            <div class="thumb">
                                <x-profile-img :user="$student" />
                            </div>
                            <div class="content pt-2">
                                <h5 class="title">{{$student->firstname}} {{$student->lastname}}</h5>
                            </div>
                        </div>
                        <div>
                            {{$student->amount}}
                        </div>
                        <div class="taught">
                            <span>{{$student->enrolled_at}}</span>
                        </div>
                    </li>
                @empty
                    <div class="bg-light p-5 text-center radius mt-3">
                        <h5>No Student has enrolled for this session yet!</h5>
                    </div>
                @endforelse
            </ul>
        </div>
    </div>

</x-mentor-batch-detail>
