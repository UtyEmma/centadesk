@push('scripts')
    <script src="{{asset('js/plugins/tagify/tagify.min.js')}}"></script>
    <script src="{{asset('js/plugins/tagify/tagify.polyfills.min.js')}}" ></script>

    <script>
        $(document).ready(() => {
            const tagifyElement = document.querySelector('input[name=tags]')
            const tagify = new Tagify(tagifyElement, {
                placeholder: 'Click Enter to Seperate tags'
            })
        })
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/plugins/tagify.min.css')}} ">
@endpush

<input class="border radius p-1" value="{{$value ?? old('tags')}}" name="tags" type="text">
