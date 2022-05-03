@push('scripts')
    <script>
        function copyLink(){
            var copyText = document.getElementById("aff_link_input");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            navigator.clipboard.writeText("{{env('MAIN_APP_URL')}}/register?ref={{$user->affiliate_id}}");

            new Notify ({
                text: "Copied",
                effect: 'slide',
                status: 'success',
                autoclose: true,
                autotimeout: 3000,
                speed: 300 // animation speed
            })
        }
    </script>
@endpush

<div class="border radius p-2">

    <p class="mb-1 me-3" style="font-size: 13px; font-weight: 500;">Invite your friends to sign up on Libraclass</p>
    <div class="d-flex w-100 align-items-center">

        <p id="aff_link_input" class="p-2 radius border m-0 me-2 w-auto flex-1" style="font-size: 13px;">
            {{env('MAIN_APP_DOMAIN')}}/register?ref={{$user->affiliate_id}}
        </p>

        <button onclick="copyLink()" class="me-1 bg-transparent border-0 outline-0">
            <i class="icofont-ui-copy"></i>
        </button>
        {{-- <button class="bg-transparent border-0 outline-0">
            <i class="icofont-share"></i>
        </button> --}}
    </div>
</div>
