@push('scripts')
    <script>
        function copyLink(){
            navigator.clipboard.writeText("{{env('MAIN_APP_URL')}}/{{$batch->short_code}}");

            new Notify ({
                text: "Copied to clipboard",
                effect: 'slide',
                status: 'success',
                autoclose: true,
                autotimeout: 3000,
                speed: 300 // animation speed
            })
        }

    </script>
@endpush

<div class="d-flex align-items-center">
    <p id="aff_link_input" class="p-2 bg-light radius border m-0 me-2 w-auto">
        {{env('MAIN_APP_DOMAIN')}}/{{$batch->short_code}}
    </p>

    <div>
        <button onclick="copyLink()" class="me-1 bg-transparent border-0 outline-0">
            <i class="icofont-ui-copy"></i>
        </button>
    </div>
</div>
