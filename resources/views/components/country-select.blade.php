{{-- @push('scripts') --}}
    <script src="{{asset('vendor/country-select/build/js/countrySelect.js')}}" ></script>
{{-- @endpush --}}

{{-- @push('styles') --}}
    <link rel="stylesheet" href="{{ asset('vendor/country-select/build/css/countrySelect.css')}} ">
{{-- @endpush --}}


<input type="text" id="country" style="max-width: 200px;" />

<script>
    $(document).ready(() => {
        $("#country").countrySelect({
            defaultCountry: 'us'
        });
    })
</script>
