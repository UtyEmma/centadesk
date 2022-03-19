<div class="row">

    <div class="col-md-9 mx-auto row row-cols-1 gy-3 px-0">

        <div class="p-0">
            <h4>KYC Confirmation</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, nemo.</p>
        </div>

        <div class="border p-3 py-5 p-md-5 radius">
            <div><h6 class="p-0">Upload KYC Document</h6></div>
            <div class="row">
                <div class="single-form col-md-7">
                    <select name="kyc_method" class="radius form-select border py-3 px-3 mb-3">
                        <option value="">Select Identification Document</option>
                        <option>National Identity Card</option>
                        <option>International Passport</option>
                        <option>Drivers License</option>
                        <option>Voters Card</option>
                    </select>
                </div>

                <div class="single-form col-md-7">
                    <input class="input" name="id_number"  placeholder="Identity Number (The Number written on your card)">
                </div>

                <div class="mt-5 col-md-7">
                    <label for="formFileMultiple" name="id_image" class="form-label">Upload Document Image</label>
                    <input class="form-control border form-control-lg radius" type="file" name="id_image" id="formFileMultiple">
                </div>
            </div>
        </div>

        <div class="single-form d-flex justify-content-between px-0">
            <button type="button" class="btn btn-primary" onclick="previous()">Previous</button>
            <button type="button" class="btn btn-primary" onclick="next()">Next</button>
        </div>
    </div>
</div>
