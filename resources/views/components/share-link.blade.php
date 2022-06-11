{{-- @push('scripts') --}}
    <script>
        function copyLink(link){
            navigator.clipboard.writeText(link);

            new Notify ({
                text: "Copied Successfully!",
                effect: 'slide',
                status: 'success',
                autoclose: true,
                autotimeout: 3000,
                speed: 300 // animation speed
            })
        }

        async function shareLink(link){
            shareData = {
                title: 'Hi, come join Libraclass',
                text: 'I am inviting you to join Libraclass',
                url: link
            }

            await navigator.share(shareData)
        }
    </script>
{{-- @endpush --}}

<div class="">
    <div class="d-flex w-100 align-items-center">
        <p id="aff_link_input" class="p-2 radius border flex-grow-1 m-0 me-2 bg-light text-truncate" style="font-size: 14px;">
            {{$link}}
        </p>

        <div class="d-flex">
            <button onclick="copyLink('{{$link}}')" title="Copy" type="button" class="btn btn-secondary btn-hover-primary h-auto btn-custom d-flex align-items-center justify-content-center py-2 px-2 me-2" >
                <i class="icofont-ui-copy ms-0 fs-5"></i>
            </button>
            <button onclick="shareLink('{{$link}}')" title="Copy" type="button" class="btn btn-secondary btn-hover-primary h-auto btn-custom d-flex align-items-center justify-content-center py-2 px-2" >
                <i class="icofont-share ms-0 fs-5"></i>
            </button>
        </div>
    </div>
</div>
