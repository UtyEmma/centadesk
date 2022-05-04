@push('scripts')
    <script src="{{asset('vendor/datatables/datatables.min.js')}}"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{asset('vendor/datatables/datatables.min.css')}}">
@endpush

<script>
    $(document).ready(() => {
        $('#{{$id}}').DataTable();
    })
</script>

<table id="{{$id}}" class="{{$class ?? 'hover table-striped table-active
table-hover table-responsive w-100'}}">
    {{$slot}}
</table>
