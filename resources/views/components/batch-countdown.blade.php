@if (Date::parse($batch->startdate) > now())
    {{-- The course is upcoming --}}
    <div class="card border radius h-100">
        <div class="card-body">
            <div class="p-1 pt-3 radius text-center bg-light">
                <h6 class="text-uppercase fw-bold">Time to Class</h6>
            </div>
            <div class="text-center">
                <x-countdown.timer id="countdown-timer" :date="$batch->startdate">
                    <h4 style="font-weight: 500;" id="countdown-timer" class="text-primary mt-2">{{$batch->startdate}}</h4>
                </x-countdown.timer>
            </div>
        </div>
    </div>
@elseif (now() > Date::parse($batch->enddate))
    {{-- The course end date has passed  --}}
    <div class="card border radius h-100">
        <div class="card-body">
            <div class="text-center">
                <h4 style="font-weight: 500;" class="text-primary mt-2">This batch has been completed</h4>

                @if ($batch->certificates)
                    <a href="{{route('enrolledBatchRoute')}}/certificate">Download Certificate</a>
                @endif
                <a href="/courses">
                    <x-btn classes="btn-primary btn-hover-dark">View Upcoming Classes</x-btn>
                </a>
            </div>
        </div>
    </div>
@elseif (Date::parse($batch->startdate)->lessThanOrEqualTo(Date::now()) && Date::parse($batch->enddate)->greaterThanOrEqualTo(Date::now()))
    {{-- The Course is Ongoing --}}
    <div class="card border radius h-100">
        <div class="card-body">
            <div class="text-center">
                <h4 style="font-weight: 500;" id="countdown-timer" class="text-primary mt-2">
                    This batch is currently ongoing!
                </h4>
            </div>
        </div>
    </div>
@endif
