<x-guest-layout>

    @auth
        @include('front.student.js.enrollment-js')
    @endauth

    <x-page-banner>
        <x-slot name="current">
            Courses
        </x-slot>
        <x-slot name="title">
            Enroll for <span>{{$batch->title}}</span>
        </x-slot>
    </x-page-banner>

    <div class="section section-padding">
        <div class="container">
            <div class="card radius p-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 bg-light radius p-2 ">
                            <div class="mb-3">
                                <p class="dis fw-bold mb-0">Full Name</p>
                                <p>{{$user->firstname}} {{$user->lastname}}</p>
                            </div>
                            <div class="mb-3">
                                <p class="dis fw-bold mb-0">Email address</p>
                                <p>{{$user->email}}</p>
                            </div>
                        </div>

                        <div class="col-md-6 p-md-4">
                            <div >
                                <div>
                                    <h5>Payment Details</h5>
                                    <p class="dis mb-3 mt-0">Complete your purchase by providing your payment details</p>
                                </div>

                                <div>
                                    <div class="address">
                                        <div class="d-flex flex-column dis">
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <p>Base Price</p>
                                                <p><span class="fas fa-dollar-sign"></span>{{$user->currency}} {{number_format($batch->price)}}</p>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <p>Discount
                                                    <span>
                                                        (@if ($batch->discount === 'percent')
                                                                {{$batch->percent}}%
                                                            @elseif ($batch->discount === 'fixed')
                                                                Fixed
                                                            @else
                                                                None
                                                            @endif)
                                                    </span></p>
                                                <p><span class="fas fa-dollar-sign"></span>
                                                    @if ($batch->discount === 'percent')
                                                        - {{$user->currency}} {{number_format(ceil($batch->percent / 100 * $batch->price))}}
                                                    @elseif ($batch->discount === 'fixed')
                                                        {{$batch->fixed}}
                                                    @else
                                                        None
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <p class="fw-bold">Total</p>
                                                <p class="fw-bold"><span class="fas fa-dollar-sign"></span>{{$user->currency}} {{number_format($batch->discount_price)}}</p>
                                            </div>

                                            <div class="d-flex ">
                                                {{-- <div class="col-md-6"> --}}
                                                    <button type="button" onclick="handlePayment()" class="btn btn-primary mt-2 me-3">Pay with Flutterwave</button>
                                                {{-- </div> --}}

                                                {{-- <div class="col-md-6"> --}}
                                                    <a href="/enroll/crypto/pay/{{$batch->unique_id}}" type="button" class="btn btn-primary mt-2">Pay with Crypto</a>
                                                {{-- </div> --}}
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
