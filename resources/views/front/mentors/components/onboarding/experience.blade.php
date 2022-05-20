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

                                <div class="single-form w-full col-6">
                                    <label for="" class="mb-1">Start Date</label>
                                    <input type="date" class="form-control" id="startdate" placeholder="Start Date" />
                                    <small id="startdate-error" class="text-danger"></small>
                                </div>

                                <div class="single-form w-full col-6">
                                    <label for="" class="mb-1">End date</label>
                                    <input type="date" class="form-control" id="enddate" placeholder="End Date" />
                                    <small id="enddate-error" class="text-danger"></small>
                                </div>
                            </div>

                            <div class="d-flex align-items-center mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" id="current"  type="checkbox">
                                    <label class="form-check-label fs-6" for="current">
                                        Current Position
                                    </label>
                                </div>
                            </div>

                            {{-- <div class="col-md-12">
                                <div class="single-form">
                                    <label for="" class="mb-1">Description</label>
                                    <textarea id="description" rows="2"></textarea>
                                </div>
                            </div> --}}

                            <div class="mt-3">
                                <button class="btn btn-primary btn-hover-dark btn-custom" type="button" onclick="addExperience()" >Add</button>
                            </div>
                        </div>

                        <div class="col-md-5 mb-4">
                            <div id="experience-container" class="p-3 mt-5 mt-md-0 bg-light-primary h-100 radius">
                                <div id="experienceDefault">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="mb-2 p-5 text-center">
                                            <div class="col-6 mx-auto mb-3">
                                                <img src="{{asset('images/icon/resume.svg')}}" alt="">
                                            </div>

                                            <h5 class="my-2" >Add Your Work Experience</h5>
                                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsam totam commodi odio voluptatibus minus ducimus culpa sed, fugiat.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
