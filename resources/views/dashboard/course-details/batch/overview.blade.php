<x-mentor-batch-detail :course="$course" :mentor="$mentor" :batch="$batch">
    <x-page-title title="Mentor Dashboard - {{$batch->title}}" />
    <div class="engagement-courses  pt-0 mt-3">
        <div class="courses-top bg-secondary">
            <ul class="w-100 d-flex justify-content-around">
                <li>Student</li>
                <li>Enrollment Date</li>
            </ul>
        </div>

        <div class="courses-list">
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
                        <div class="taught">
                            <span>{{$student->enrolled_at}}</span>
                        </div>
                    </li>
                @empty
                    <div class="bg-light p-5 text-center radius mt-5">
                        <h3>No Student has enrolled for this batch yet!</h3>
                    </div>
                @endforelse
            </ul>
        </div>
    </div>

</x-mentor-batch-detail>
