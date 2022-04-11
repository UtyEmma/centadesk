@push('scripts')
    <script>
        function copyLink(){
            var copyText = document.getElementById("aff_link_input");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            navigator.clipboard.writeText("{{env('MAIN_APP_URL')}}/login?ref={{$user->affiliate_id}}");

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

<div class="border radius p-2 me-3 ">
    <p class="lh-0 mb-1" style="font-size: 13px;">Affiliate Link</p>

    <div class="d-flex align-items-center">
        <input id="aff_link_input" class="p-2 px-3 bg-white radius border-0 me-2" style="font-size: 14px;" readonly value="{{env('MAIN_APP_DOMAIN')}}?ref={{$user->affiliate_id}}" />

        <button onclick="copyLink()" class="me-1 bg-transparent border-0 outline-0">
            <i class="icofont-ui-copy"></i>
        </button>
        <button class="bg-transparent border-0 outline-0">
            <i class="icofont-share"></i>
        </button>
    </div>
</div>
