<x-guest-layout>
    <x-page-title title="Welcome onboard" />
    <!-- Page Banner Start -->
    <div class="section page-banner bg-transparent">

        <div class="container mt-5">
            <!-- Page Banner Start -->
            <div class="page-banner-content py-5"></div>
            <!-- Page Banner End -->
        </div>
    </div>
    <!-- Page Banner End -->

    @push('styles')
        <style>
            .category-select:checked + label{
                color: #fafafa !important;
                background: #309255 !important;
                font-weight: 500;
            }
        </style>
    @endpush

    <div class="section section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-7 mx-auto text-md-center" >
                    <h3>Welcome Onboard, {{$user->firstname}}</h3>
                    <p>We would love what you are interested in to help us bring you the most relevant content</p>
                </div>
            </div>

            <x-interest-select :categories="$categories" />
        </div>
    </div>

</x-student-layout>
