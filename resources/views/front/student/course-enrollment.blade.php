<x-guest-layout>

    @include('front.student.js.enrollment-js')

    <x-page-banner>
        <x-slot name="current">
            Enroll
        </x-slot>
        <x-slot name="title">
            {{$course->name}}
        </x-slot>
    </x-page-banner>

    <div class="section section-padding mt-n10">
        <div class="container">
            <h3>Enroll for {{$course->name}}</h3>


            <div class="row">
                <div class="col-md-7">

                </div>
                <div class="col-md-5">
                    <form onsubmit="createTransaction(event)" id="enrollmentForm" >

                        <input hidden name="course" value="{{$course->slug}}" />
                        <input hidden name="batch" value="{{$batch->unique_id}}" />
                        <div class="single-form">
                            <input type="text" name="name" id="" value="{{$user->firstname.' '.$user->lastname}}" placeholder="Your Name">
                        </div>

                        <div class="single-form">
                            <input type="text" name="email" id="" value="{{$user->email}}" placeholder="Email Address">
                        </div>

                        <div class="single-form">
                            <button type="submit" class="btn btn-primary">Enroll</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-guest-layout>
