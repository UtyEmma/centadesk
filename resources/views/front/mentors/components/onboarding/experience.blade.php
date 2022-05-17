<div>

    @include('front.mentors.js.experience-js')

    <div class="px-0">
            <div>
            <div class="px-0 mt-3">
                <h5 class="mb-0">Experience Information</h5>
                <p>Share your experience to prove your expertise.</p>
            </div>

            <div class="">
                <small class="text-danger text-capitalize">
                    @error('experience')
                        {{$message}}
                    @enderror
                </small>

                <small id="experience-error" class="text-danger"></small>

                <div id="experienceItem">
                    <input id="experience_id" hidden />
                    <div class="row">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="single-form col-md-6">
                                    <label for="" class="mb-1">Company or Organization</label>
                                    <input type="text" id="company" placeholder="Company or Organization" />
                                    <small id="company-error" class="text-danger"></small>
                                </div>


                                <div class="single-form col-md-6">
                                    <label for="" class="mb-1">Role</label>
                                    <input type="text" id="role" placeholder="Role" />
                                    <small id="role-error" class="text-danger"></small>
                                </div>

                                <div class="single-form w-full col-md-6">
                                    <label for="" class="mb-1">Start Date</label>
                                    <input type="date" class="form-control" id="startdate" placeholder="Start Date" />
                                    <small id="startdate-error" class="text-danger"></small>
                                </div>

                                <div class="single-form w-full col-md-6">
                                    <label for="" class="mb-1">End date</label>
                                    <input type="date" class="form-control" id="enddate" placeholder="End Date" />
                                    <small id="enddate-error" class="text-danger"></small>
                                </div>
                            </div>

                            <div class="single-form d-flex align-items-center">
                                <input type="checkbox" id="current" class="me-2 checkbox"  />
                                <label for="current">Current Position</label>
                            </div>

                            <div class="col-md-12">
                                <div class="single-form">
                                    <label for="" class="mb-1">Description</label>
                                    <textarea id="description" rows="2"></textarea>
                                </div>
                            </div>

                            <div class="mt-3">
                                <button class="btn btn-primary btn-hover-dark btn-custom" type="button" onclick="addExperience()" >Add</button>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div id="experience-container"></div>
                            <textarea name="experience" id="experience-input" hidden cols="30" rows="10"></textarea>
                        </div>
                    </div>

                </div>
            </div>

            <div class="single-form d-flex justify-content-between px-0">
                <button type="button" class="btn btn-primary btn-hover-dark btn-custom" onclick="previous()">Previous</button>
                <button type="button" class="btn btn-primary btn-hover-dark btn-custom" onclick="handleNext(experienceNext)">Next</button>
            </div>
        </div>
    </div>

</div>
