<x-mentor-profile>
    <div class="">
        <x-page-title title="Mentor Dashboard - Payment Details" />

        <div class="row">
            <div class="col-md-8">
                <div class="border mb-4 radius p-3">
                    <div class="p-5 px-3">
                        <div>
                            <h6 class="p-0">Bank Information</h6>
                            <p>To update your account details, please reach out to our support team.</p>
                        </div>

                        <p id="bank_info_error" class="text-danger"></p>

                        <div class="row">
                            <div class="single-form col-md-6">
                                <label class="">Bank</label>
                                <input class="input" name='bank' readonly     value="{{$user->bank}}" placeholder="Bank">
                                <small class="text-danger text-capitalize">
                                    @error('bank')
                                        {{$message}}
                                    @enderror
                                </small>
                            </div>

                            <div class="single-form col-md-6">
                                <label class="">Account Number</label>
                                <input class="input" name='account_number' readonly  value="{{$user->account_no}}" placeholder="Account Number">
                                <small class="text-danger text-capitalize">
                                    @error('account_number')
                                        {{$message}}
                                    @enderror
                                </small>
                            </div>

                            <div class="single-form">
                                <label class="">Account Name</label>
                                <h5 id="account_name"></h5>
                                <input class="input" name="account_name" readonly value="{{$user->account_name}}"  placeholder="Account Name" >
                                <small class="text-danger text-capitalize">
                                    @error('account_name')
                                        {{$message}}
                                    @enderror
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    </form>
</x-mentor-profile>
