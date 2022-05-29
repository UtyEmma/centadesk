<x-mentor-profile>
    <form action="/me/account/update" method="POST" >
        @csrf
    <div class="">
        <x-page-title title="Mentor Dashboard - Payment Details" />

        <div class="row">
            {{-- <div class="col-md-4">
                <div class="border p-3 py-5 p-md-5 radius mb-4">
                    <div>
                        <h6 class="mb-0">Select Default Payment Option</h6>
                        <p class="mb-0">Set how you want to receive your payments </p>
                    </div>

                    <div class="">
                        <div class="my-2">
                            <input class="radio-custom" checked hidden type="radio" name="payment_method" id="bank" value="bank">
                            <label for="bank" class="border cursor-pointer d-flex justify-content-between align-items-center radius p-4 w-100">
                                <span>Bank Account</span>
                                <i class="icofont-check-circled fs-4 d-none"></i>
                            </label>
                        </div>

                        <div class="my-2">
                            <input class="radio-custom" hidden type="radio" name="payment_method" id="crypto" value="crypto">
                            <label for="crypto" class="cursor-pointer border p-4 d-flex justify-content-between align-items-center radius w-100">
                                <span>Crypto</span>
                                <i class="icofont-check-circled fs-4 d-none"></i>
                            </label>
                        </div>
                    </div>
                    <small class="text-danger text-capitalize">
                        @error('payment_method')
                            {{$message}}
                        @enderror
                    </small>

                    <div>
                        <button class="btn btn-primary btn-hover-dark">Update</button>
                    </div>
                </div>
            </div> --}}

            <div class="col-md-8">
                <div class="border mb-4 radius p-3">
                    <div class="p-5 px-3">
                        <div>
                            <h6 class="p-0">Bank Information</h6>
                            <p>Please provide your bank account information </p>
                        </div>

                        <p id="bank_info_error" class="text-danger"></p>

                        <div class="row">
                            <div class="single-form col-md-6">
                                <label class="">Bank</label>
                                <input class="input" name='bank'  value="{{$user->bank}}" placeholder="Bank">
                                <small class="text-danger text-capitalize">
                                    @error('bank')
                                        {{$message}}
                                    @enderror
                                </small>
                            </div>

                            <div class="single-form col-md-6">
                                <label class="">Account Number</label>
                                <input class="input" name='account_number'  value="{{$user->account_no}}" placeholder="Account Number">
                                <small class="text-danger text-capitalize">
                                    @error('account_number')
                                        {{$message}}
                                    @enderror
                                </small>
                            </div>

                            <div class="single-form">
                                <label class="">Account Name</label>
                                <h5 id="account_name"></h5>
                                <input class="input" name="account_name"  value="{{$user->account_name}}"  placeholder="Account Name" >
                                <small class="text-danger text-capitalize">
                                    @error('account_name')
                                        {{$message}}
                                    @enderror
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="border my-2 radius p-5">
                    <div class="p-5 px-3">
                        <div>
                            <h6 class="p-0">Crypto Wallet</h6>
                            <p>Please provide your Ethereum (ER20) Wallet Address </p>
                        </div>

                        <div class="single-form">
                            <input class="input w-md-50" name="crypto_address" value="{{$user->crypto_address}}" readonly placeholder="Paste Wallet Address">
                            <small class="text-danger text-capitalize">
                                @error('crypto_address')
                                    {{$message}}
                                @enderror
                            </small>
                        </div>
                    </div>
                </div> --}}

                <div class="single-form d-flex justify-content-end px-0">
                    <button type="submit" class="btn btn-primary btn-hover-dark">Update Payment Settings</button>
                </div>
            </div>

        </div>
    </div>

    </form>
</x-mentor-profile>
