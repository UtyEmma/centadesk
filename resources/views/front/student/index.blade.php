<x-guest-layout>

    <!-- Page Banner Start -->
    <div class="section pt-10 bg-secondary ">

        <img class="shape-1 animation-round" src="{{asset('images/shape/shape-8.png')}}" alt="Shape">

        <img class="shape-2" src="{{asset('images/shape/shape-23.png')}}" alt="Shape">


        <!-- Shape Icon Box Start -->
        <div class="shape-icon-box">
            <img class="icon-shape-2" src="{{asset('images/shape/shape-6.png')}}" alt="Shape">
        </div>
        <!-- Shape Icon Box End -->

        {{-- <img class="shape-3" src="{{asset('images/shape/shape-24.png')}}" alt="Shape"> --}}


        <div class="container mb-0">
            <!-- All Courses Tabs Menu Start -->
            <div class="bg-transparent w-100 courses-active mt-10 bg-primary">
                <ul class="nav justify-start border-bottom border-primary ">
                    <li class="w-auto"><a href="/profile/courses" class="active border-bottom pb-3">My Courses</a></li>
                    <li class="w-auto"><a href="#" class="border-bottom">My Mentors</a></li>
                    <li class="w-auto"><a href="#" class="border-bottom">My Profile</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page Banner End -->

    <div class="container py-5">
        {{$slot}}
    </div>


</x-guest-layout>

