@push('scripts')
    <script src="{{asset('js/plugins/magnific-popup.min.js')}}" ></script>

@endpush

@push('styles')
    <link rel="stylesheet" href="{{asset('css/plugins/magnific-popup.css')}}">
@endpush

<script>
    $('#lightbox-container').magnificPopup({
        delegate: 'a', // child items selector, by clicking on it popup will open
        type: 'image'
    });
</script>

<div id="lightbox-container">
    <a href="{{$src}}">
    {{$slot}}
    </a>
</div>
