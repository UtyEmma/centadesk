<div class="row">

    @include('front.mentors.js.experience-js')

    <div class="col-md-9 mx-auto px-0 row row-cols-1 gy-3">
        <div class="px-0">
            <h4>Experience Information</h4>
            <p>Share your experience to prove your expertise.</p>
        </div>

        <div class="border p-3 py-5 p-md-5 radius">
            <div>
                <h6 class="p-0">Experience Information</h6>
            </div>

            <small class="text-danger text-capitalize">
                @error('experience')
                    {{$message}}
                @enderror
            </small>

            <small id="experience-error" class="text-danger"></small>


            <div id="experience-container">

            </div>

            <textarea name="experience" id="experience-input" hidden cols="30" rows="10"></textarea>

            <div id="experienceItem">
                <div class="single-form">
                    <input type="text" id="company" placeholder="Comany or Organization" />
                    <small id="company-error" class="text-danger"></small>
                </div>


                <div class="single-form">
                    <input type="text" id="role" placeholder="Role" />
                    <small id="role-error" class="text-danger"></small>
                </div>

                <input id="experience_id" hidden />


                <div class="row">
                    <div class="single-form w-full col-md-5">
                        <input type="date" class="form-control" id="startdate" placeholder="Year Acquired" />
                        <small id="startdate-error" class="text-danger"></small>
                    </div>

                    <div class="single-form w-full col-md-5">
                        <input type="date" class="form-control" id="enddate" placeholder="Year Acquired" />
                        <small id="enddate-error" class="text-danger"></small>
                    </div>

                    <div class="d-flex align-items-center justify-content-end w-full col-md-2">
                        <label for="current">Current Position</label>
                        <input type="checkbox" id="current" class="ms-3 checkbox"  />
                    </div>
                </div>

            </div>

            <div class="mt-3">
                <button class="btn btn-primary" type="button" onclick="addExperience()" >Add</button>
            </div>
        </div>



        <div class="single-form d-flex justify-content-between px-0">
            <button type="button" class="btn btn-primary" onclick="previous()">Previous</button>
            <button type="button" class="btn btn-primary" onclick="handleNext(experienceNext)">Next</button>
        </div>
    </div>

</div>
