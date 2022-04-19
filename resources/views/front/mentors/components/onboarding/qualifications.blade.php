<div class="row">

    @include('front.mentors.js.qualification-js')

    <div class="col-md-9 mx-auto px-0 row row-cols-1 gy-3">
        <div class="px-0">
            <h5 class="mb-0">Your Qualifications</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, nemo.</p>
        </div>

        <div class="border p-3 py-5 p-md-5 radius">
            <div>
                <h6 class="p-0">Skills</h6>
            </div>

            <small id="qualification-section-error" class="text-danger text-capitalize">
                @error('payment_method')
                    {{$message}}
                @enderror
            </small>

            <div id="qualificationContainer"></div>

            <textarea name="qualification" hidden id="qualification-input" cols="30" rows="10"></textarea>

            <div id="qualificationItem">
                <div class="single-form">
                    <input type="text" id="qualification" placeholder="Qualification" />
                    <small id="qualification-error" class="text-danger"></small>
                </div>

                <input hidden  id="qualification_id" />

                <div class="row">
                    <div class="col-md-6 w-full">
                        <div class="single-form">
                            <input type="text" id="institution" placeholder="Institution" />
                            <small id="institution-error" class="text-danger"></small>
                        </div>
                    </div>

                    <div class="single-form w-full col-md-6">
                        <input type="date" class="form-control" id="date" placeholder="Year Acquired" />
                        <small id="date-error" class="text-danger"></small>
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <button class="btn btn-primary" type="button" onclick="addQualificationItem()" >Add</button>
            </div>
        </div>

        <div class="single-form d-flex justify-content-between px-0">
            <button type="button" class="btn btn-primary" onclick="previous()">Previous</button>
            <button type="button" class="btn btn-primary" onclick="handleNext(checkForQualifications)">Next</button>
        </div>
    </div>
</div>
