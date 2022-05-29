<div class="text-dark">
    <h6>
        You reported this batch
    </h6>

    <div>
        <small>Your Report is <span class="fw-bold {{$report->status === 'resolved' ? 'text-primary' : 'text-warning'}}" style="text-transform: capitalize; ">{{strtoupper($report->status)}}</span></small>
    </div>

    <p class="p-2 bg-light-primary radius mt-2">
        {{$report->message}}
    </p>

<div class="mt-3">
    {{-- <small>If your issue has been resolved, please click below</small> --}}
    @if ($report->status !== 'resolved')
    <a href="/reports/resolve/{{$batch->unique_id}}" class="btn w-100 btn-primary btn-hover-dark" style="font-size: 14px; line-height: 3.5;">Mark as Resolved</a>
    @endif
</div>
</div>
