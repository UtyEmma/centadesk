@push('scripts')
    <script>
        function copyLink(){
            // var copyText = document.getElementById("aff_link_input");
            // copyText.select();
            // copyText.setSelectionRange(0, 99999);
            navigator.clipboard.writeText("{{env('MAIN_APP_URL')}}/register?ref={{$user->affiliate_id}}");

            new Notify ({
                text: "Copied Successfully!",
                effect: 'slide',
                status: 'success',
                autoclose: true,
                autotimeout: 3000,
                speed: 300 // animation speed
            })
        }

        async function shareLink(){
            shareData = {
                title: 'Hi, come join Libraclass',
                text: 'I am inviting you to join Libraclass',
                url: 'https://libraclass.com/register?ref={{$user->affiliate_id}}'
            }

            await navigator.share(shareData)
        }
    </script>
@endpush

<div class="">
    <div class="d-flex w-100 align-items-center">

        <p id="aff_link_input" class="p-2 radius border m-0 me-2 flex-1 bg-light" style="font-size: 14px;">
            {{env('MAIN_APP_DOMAIN')}}/register?ref={{$user->affiliate_id}}
        </p>

        <div class="">
            <button onclick="copyLink()" title="Copy" class="me-1 bg-transparent border-0 outline-0">
                <i class="icofont-ui-copy"></i>
            </button>
            <button onclick="shareLink()" title="Share" class="bg-transparent border-0 outline-0">
                <i class="icofont-share"></i>
            </button>
        </div>
    </div>
</div>
