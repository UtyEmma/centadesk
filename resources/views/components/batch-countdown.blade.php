@if (Date::parse($batch->startdate) > now())
    <div class="card border radius h-100">
        <div class="card-body">
            <div class="p-1 pt-3 radius text-center bg-light">
                <h6 class="text-uppercase fw-bold">Session Begins</h6>
            </div>
            <div class="text-center">
                <x-countdown.timer id="countdown-timer" :date="$batch->startdate">
                    <h4 style="font-weight: 500;" id="countdown-timer" class="text-primary mt-2"></h4>
                </x-countdown.timer>
            </div>
        </div>
    </div>
@elseif (now() > Date::parse($batch->enddate))
    <div class="card border radius h-100">
        <div class="card-body">
            <div class="text-center">
                <h5 style="font-weight: 500;" class="text-primary mt-2">This session has been completed</h5>

                <a href="/courses">
                    <x-btn classes="btn-primary btn-hover-dark">View Upcoming Classes</x-btn>
                </a>
            </div>
        </div>
    </div>
@elseif (Date::parse($batch->startdate)->lessThanOrEqualTo(Date::now()) && Date::parse($batch->enddate)->greaterThanOrEqualTo(Date::now()))
    <div class="card border radius h-100">
        <div class="card-body">
            <div class="text-center">
                <h5 style="font-weight: 500;" id="countdown-timer" class="text-primary mt-2">
                    This session is currently in progress!
                </h5>
            </div>
        </div>
    </div>
@endif
