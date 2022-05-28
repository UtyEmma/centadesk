<!-- Create the editor container -->
<div id="editor" class="border radius" style="height: 200px"></div>
<textarea type="text" id="text-content" hidden name="{{$name}}"></textarea>

@push('styles')
    <link rel="stylesheet" href="{{asset('css/plugins/quill-snow.css')}}">
@endpush

@push('scripts')
    <script src="{{asset('js/plugins/quill.js')}}" ></script>

    <script>
        $(document).ready(() => {
            var quill = new Quill('#editor', {
                modules: {
                    toolbar: [
                        [{ 'header': [1, 2, 3, 4, 5,  false] }],
                        [
                            'bold',
                            'italic',
                            'underline',
                            // 'strike'
                        ],
                        [
                            'blockquote',
                            'code-block'
                        ],

                        // [{ 'header': 1 }, { 'header': 2 }],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        // [{ 'script': 'sub'}, { 'script': 'super' }],
                        // [{ 'indent': '-1'}, { 'indent': '+1' }],


                        // [{ 'align': [] }],

                        // ['clean']
                    ],
                },
                placeholder: '{{$placeholder ?? "Compose an epic..."}}',
                theme: 'snow'  // or 'bubble'
            });

            quill.root.insertAdjacentHTML('afterbegin', "{!! $value ?? '' !!}")

            quill.on('text-change', function(delta, oldDelta, source) {
                $('#text-content').val(quill.root.innerHTML)
            });

            $('.ql-toolbar').addClass('border radius mb-2 p-2 py-3')
        })
    </script>
@endpush
