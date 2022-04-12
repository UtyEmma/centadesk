<div class="p-4 alert alert-info text-dark">
    <h6>
        You reported this batch
    </h6>

    <p>
        {{$report->message}}
    </p>
{{$batch->reportable}}
    <span class="badge badge-primary bg-primary text-white">
        {{$report->status}}
    </span>
<div class="mt-3">
    @if ($report->status !== 'resolved')
    <a href="/reports/resolve/{{$batch->unique_id}}" class="btn w-100 btn-primary btn-hover-dark">Mark as Resolved</a>
    @endif
</div>
</div>
