<x-app-layout>
    <x-page-title title="Mentor Dashboard - Overview" />
    <div class="my-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    <h4 class="lh-0">Welcome {{$user->firstname}}</h4>
                    <h6 class="">Here is how you are doing!</h6>

                    <div class="overview-box px-0">
                        <div class="single-box my-1 px-3 ">
                            <h5 class="title">Revenue</h5>
                            <div class="count">&#8358; {{number_format($user->earnings)}}</div>
                            {{-- <p><span>$235.00</span> This months</p> --}}
                        </div>

                        <div class="single-box my-1 px-3">
                            <h5 class="title">Enrollments</h5>
                            <div class="count">{{$user->students_count}}</div>
                            {{-- <p><span>345</span> This months</p> --}}
                        </div>

                        <div class="single-box my-1 px-3">
                            <h5 class="title">Rating</h5>
                            <div class="count">
                                {{$user->avg_rating}}.0

                                <span class="rating-star">
                                        <span class="rating-bar" style="width: {{$user->avg_rating * 20}}%;"></span>
                                </span>
                            </div>
                            {{-- <p><span>58</span> This months</p> --}}
                        </div>
                    </div>
                </div>
            </div>

            <x-new-course />

            {{-- <x-mentor-charts /> --}}

            <x-course-resources />
        </div>
    </div>
</x-app-layout>
