<x-blank-layout>

    @include('layouts.guest.guest-header')

    <!-- Overlay Start -->
    <div class="overlay"></div>
    <!-- Overlay End -->

    {{$slot}}


    @include('layouts.guest.guest-footer')

</x-blank-layout>
