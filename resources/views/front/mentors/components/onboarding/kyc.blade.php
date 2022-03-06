<div class="row">
    <div class="col-md-9 mx-auto row row-cols-1 gy-3 px-0">
        <div class="p-0">
            <h4>KYC Confirmation</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, nemo.</p>
        </div>

        <div class="border p-5 radius">
            <div><h6 class="p-0">Upload KYC Document</h6></div>
            <div class="single-form">
                <select name="kyc_method" class="w-md-50 select mb-3 radius input">
                    <option>Select Mode of Identification</option>
                    <option>National Identity Card</option>
                    <option>International Passport</option>
                    <option>Drivers License</option>
                    <option>Other</option>
                </select>
            </div>
            <div class="single-form">
                <input class="input" name="id_number"  placeholder="Identity Number (The Number written on your card)">
            </div>
            <div class="mt-2">
                <label for="formFileMultiple" name="id_image" class="form-label">Upload Identification Document</label>
                <input class="form-control border form-control-lg radius" type="file" name="id_image" id="formFileMultiple">
            </div>
        </div>

        <div class="single-form d-flex justify-content-between">
            <button type="button" class="btn btn-primary" onclick="previous()">Previous</button>
            <button type="button" class="btn btn-primary" onclick="next()">Next</button>
        </div>
    </div>
</div>
