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

        <p id="aff_link_input" class="p-2 radius border m-0 me-2 flex-1 bg-light text-truncate" style="font-size: 14px;">
            {{env('MAIN_APP_DOMAIN')}}/register?ref={{$user->affiliate_id}}
        </p>

        <div class="d-flex">
            <button onclick="copyLink()" title="Copy" type="button" class="btn btn-secondary btn-hover-primary h-auto btn-custom d-flex align-items-center justify-content-center py-2 px-2 me-2" >
                <i class="icofont-ui-copy ms-0 fs-5"></i>
            </button>
            <button onclick="shareLink()" title="Copy" type="button" class="btn btn-secondary btn-hover-primary h-auto btn-custom d-flex align-items-center justify-content-center py-2 px-2" >
                <i class="icofont-share ms-0 fs-5"></i>
            </button>
        </div>
    </div>
</div>
