<div class="card border radius">
    <div class="card-body">
        <div class="p-1 pt-3 radius text-center bg-light">
            <h6 class="text-uppercase">Time to Class</h6>
        </div>
        <div class="text-center">
            <x-countdown.timer id="countdown-timer" :date="$batch->startdate">
                <h4 style="font-weight: 500;" id="countdown-timer" class="text-primary mt-2">00d : 00h : 00m : 00s</h4>
            </x-countdown.timer>
        </div>
    </div>
</div>
