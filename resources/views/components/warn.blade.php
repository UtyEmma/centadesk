@push('scripts')
    <script src="{{asset('js/plugins/sweetalert.js')}}"></script>

    <script>
        function handle(e){
            e.preventDefault()

            const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "{{$subtext ?? ''}}",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{$href}}"
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your action was cancelled',
                    'error'
                    )
                }
            })
        }
    </script>
@endpush

<button onclick="handle()" class="{{$class}}">{{$slot}}</button>


