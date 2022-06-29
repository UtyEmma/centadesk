@include('front.mentors.js.bank-details-verification-js')
{{-- @include('front.mentors.js.crypto-wallet-js') --}}

<div >
    <div class="px-0">
        <div class="p-0 mt-3">
            <h5 class="mb-0">Bank Account Information</h5>
        </div>

        <div class="col-md-7">
            <p id="bank_info_error" class="text-danger"></p>

            <div class="single-form">
                <x-selectpicker :search="true" name="bank" classes='w-100' class="w-100 radius form-select border mb-2">
                    <option>Select Bank</option>
                    @foreach ($banks as $bank)
                        <option value="{{$bank->code}}">{{$bank->name}}</option>
                    @endforeach
                </x-selectpicker>
                <small class="text-danger text-capitalize">
                    @error('bank')
                        {{$message}}
                    @enderror
                </small>
            </div>

            <div class="single-form w-md-50">
                <input class="input" name='account_no' placeholder="Account Number">
                <small class="text-danger text-capitalize">
                    @error('account_no')
                        {{$message}}
                    @enderror
                </small>
            </div>

            <div class="single-form w-md-50">
                <input class="input" name="account_name" placeholder="Account Name" >
                <small class="text-danger text-capitalize">
                    @error('account_name')
                        {{$message}}
                    @enderror
                </small>
            </div>
        </div>

        <div class="single-form d-flex justify-content-between px-0">
            <button type="button" class="btn btn-primary btn-custom btn-hover-dark" onclick="previous()">Previous</button>
            <button type="submit" class="btn btn-primary btn-custom btn-hover-dark">Submit</button>
        </div>
    </div>
</div>
