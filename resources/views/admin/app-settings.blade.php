<x-admin.app-layout>
    <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">App Settings</h4>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="exampleInputUsername1">Mentor Earnings Charges</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="{{$settings->charges}}" name="charges" placeholder="Mentor Earnings Charges" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <span class="input-group-text lead font-weight-bolder" id="basic-addon2">%</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="exampleInputUsername1">Referral Bonus</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="{{$settings->referal_bonus}}" name="referal_bonus" placeholder="Referral Bonus" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <span class="input-group-text lead font-weight-bolder" id="basic-addon2">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="exampleInputUsername1">Withdrawal Day Count</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="{{$settings->withdrawal_day_count}}" name="withdrawal_day_count" placeholder="Withdrawal Day Count" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            </div>
                        </div>
                    </div>



                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </div>
            </div>
        </div>

        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Payment Gateway Settings</h4>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="exampleInputPassword1">Flutterwave Public Key</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="rave_public_key" value="{{$settings->rave_public_key}}" aria-label="Text input with segmented dropdown button">
                                <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary">
                                    <i class="mdi mdi-eye" ></i>
                                </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="exampleInputPassword1">Flutterwave Secret Key</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="rave_secret_key" value="{{$settings->rave_secret_key}}" aria-label="Text input with segmented dropdown button">
                                <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary">
                                    <i class="mdi mdi-eye" ></i>
                                </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="exampleInputPassword1">Paystack Public Key</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="paystack_public" value="{{$settings->paystack_public}}" aria-label="Text input with segmented dropdown button">
                                <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary">
                                    <i class="mdi mdi-eye" ></i>
                                </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="exampleInputPassword1">Paystack Secret Key</label>
                            <div class="input-group">
                                <input type="password" class="form-control" name="paystack_secret" value="{{$settings->paystack_secret}}" aria-label="Text input with segmented dropdown button">
                                <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary">
                                    <i class="mdi mdi-eye" ></i>
                                </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr/>
                </div>
            </div>
        </div>
    </div>
</x-admin.app-layout>
