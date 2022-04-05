@push('scripts')
    <script>
        $(document).ready(() => {
            const tagifyElement = document.querySelector('input[name=tags]')
            new Tagify(tagifyElement, {
                placeholder: 'Click Enter to Seperate tags'
            })
        })
    </script>
@endpush

<input class="border radius p-1" value="{{old('tags')}}" name="tags" type="text">
