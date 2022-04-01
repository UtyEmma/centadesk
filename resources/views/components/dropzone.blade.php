@push('styles')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script>
        $(document).ready(() => {
            // Get a reference to the file input element
            const inputElement = document.querySelector('#fileupload');
            // Create a FilePond instance
            const pond = FilePond.create(inputElement, {
                storeAsFile: true
            });
        })
    </script>
@endpush


<input type="file" id="fileupload" name="{{$name}}" multiple="{{$multiple ?? false}}" />

