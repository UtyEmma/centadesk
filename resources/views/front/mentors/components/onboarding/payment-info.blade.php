<div class="row">
    <div class="col-md-9 mx-auto row row-cols-1 gy-3 px-0">
        <div class="p-0">
            <h4>Payment Information</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, nemo.</p>
        </div>

        <div class="border p-5 radius">
            <div>
                <h6 class="mb-0">Select Default Payment Option</h6>
                <p class="mb-0">Set how you want to receive your payments </p>
            </div>

            <div class="row mt-2">
                <div class="col-md-6">
                    <input class="radio-custom" checked hidden type="radio" name="payment_method" id="bank" value="bank">
                    <label for="bank" class="border cursor-pointer d-flex justify-content-between align-items-center radius p-4 w-100">
                        <span>Bank Account</span>
                        <i class="icofont-check-circled fs-4 d-none"></i>
                    </label>
                </div>

                <div class="col-md-6">
                    <input class="radio-custom" hidden type="radio" name="payment_method" id="crypto" value="crypto">
                    <label for="crypto" class="cursor-pointer border p-4 d-flex justify-content-between align-items-center radius w-100">
                        <span>Crypto</span>
                        <i class="icofont-check-circled fs-4 d-none"></i>
                    </label>
                </div>
            </div>
        </div>

        <div class="mx-0 px-0">
            <ul class="nav nav-tabs mb-0 mx-0" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active radius-top p-3" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Bank Account</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link radius-top p-3" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Crypto Wallet</button>
                </li>
            </ul>

            <div class="tab-content border border-top-0 radius-bottom mt-0" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="p-5 px-3">
                        <div>
                            <h6 class="p-0">Bank Information</h6>
                            <p>Please provide your bank account information </p>
                        </div>

                        <div class="single-form">
                            <select name="bank" class="w-50 select mb-3">
                                <option>Select Bank</option>
                                <option value="1">National Identity Card</option>
                                <option value="1">International Passport</option>
                                <option value="1">Drivers License</option>
                            </select>
                        </div>

                        <div class="single-form">
                            <input class="input" name="account_name" placeholder="Account Name">
                        </div>
                        <div class="single-form">
                            <input class="input" placeholder="Account Number">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="p-5 px-3">
                        <div>
                            <h6 class="p-0">Crypto Wallet</h6>
                            <p>Please provide your Ethereum (ER20) Wallet Address </p>
                        </div>

                        <div class="single-form">
                            <input class="input" name="crypto_address" placeholder="Paste Wallet Address">
                        </div>

                        <div class="mt-3">
                            <button type="button" class="btn btn-primary" >Connect to your Metamask Wallet</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-form d-flex justify-content-between px-0">
            <button type="button" class="btn btn-primary" onclick="previous()">Previous</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>
