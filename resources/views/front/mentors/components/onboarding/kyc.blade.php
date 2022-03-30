<div class="row">

    <script>

        let sizes = {
            national_identity_card: 11,
            international_passport: 8,
            drivers_license: 8
        }

        function validateKYC(){
            const values = ['kyc_method', 'id_number', 'id_image']

            clearErrors(values)

            const data = {
                kyc_method : toSlug($('[name="kyc_method"]').val(), "_"),
                id_number : $('[name="id_number"]').val(),
                id_image : $('[name="id_image"]').val()
            }

            console.log($('[name="id_image"]').val())

            const __kycSchema = {
                rules: {
                    kyc_method: `required|string`,
                    id_number: `required|numeric|digits:${sizes[data.kyc_method]}`
                },

                attributes: {
                    kyc: "KYC Method",
                    id_number: "Id Number"
                }
            }

            const validation = validator.init(data, __kycSchema)

            if(validation.fails()){
                const errors = validation.errors.errors
                parseErrors(errors)
                return false
            }

            return true
        }

    </script>

    <div class="col-md-9 mx-auto row row-cols-1 gy-3 px-0">
        <div class="p-0">
            <h4>KYC Confirmation</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, nemo.</p>
        </div>

        <div class="border p-3 py-5 p-md-5 radius">
            <div><h6 class="p-0">Upload KYC Document</h6></div>
            <div class="row">
                <div class="single-form col-md-7">
                    <select name="kyc_method" class="radius form-select border py-3 px-3">
                        <option value="">Select Identification Document</option>
                        <option>National Identity Card</option>
                        <option>International Passport</option>
                        <option>Drivers License</option>
                    </select>
                    <small class="text-danger text-capitalize" id="kyc_method-error">
                        @error('kyc_method')
                            {{$message}}
                        @enderror
                    </small>
                </div>

                <div class="single-form col-md-7">
                    <input class="input" name="id_number" value="{{old('id_number')}}"  placeholder="Identity Number (The Number written on your card)">
                    <small class="text-danger text-capitalize" id="id_number-error">
                        @error('id_number')
                            {{$message}}
                        @enderror
                    </small>
                </div>

                <div class="mt-5 col-md-7">
                    <label for="formFileMultiple" value="{{old('id_image')}}" class="form-label">Upload Document Image</label>
                    <input class="form-control border form-control-lg radius" name="id_image" type="file" id="formFileMultiple">
                    <small class="text-danger text-capitalize" id="id_image-error">
                        @error('id_image')
                            {{$message}}
                        @enderror
                    </small>
                </div>
            </div>
        </div>

        <div class="single-form d-flex justify-content-between px-0">
            <button type="button" class="btn btn-primary" onclick="previous()">Previous</button>
            <button type="button" class="btn btn-primary" onclick="handleNext(validateKYC)">Next</button>
        </div>
    </div>
</div>
