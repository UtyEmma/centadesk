<x-blank-layout>
    <div class="main-wrapper">
        @include('layouts.dashboard.app-header')

        <div class="section overflow-hidden position-relative row px-0 mx-0" id="wrapper">
            @include('layouts.dashboard.app-sidebar')

            <div class="col-md-10 offset-md-2 px-0">
                {{$slot}}
            </div>
        </div>
    </div>
</x-blank-layout>
