@push('scripts')
    <script>
        $(document).ready(() => {
            const tagifyElement = document.querySelector('input[name=tags]')
            new Tagify(tagifyElement, {
                placeholder: 'Separate Tags with a Comma'
            })
        })
    </script>
@endpush

<input class="form-control border radius px-0 py-1 fs-6" value="{{old('tags')}}" name="tags" type="text">
