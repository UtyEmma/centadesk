<div class="row">

    @include('front.mentors.js.personal-info-js')

    <div class="col-md-9 mx-auto px-0 row row-cols-1 gy-3">
        <div class="px-0">
            <h4>Personal Information</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, nemo.</p>
        </div>

        <div class="border p-3 py-5 p-md-5 radius">
            <div>
                <h6 class="p-0">Personal Information</h6>
            </div>

            <div class="row">
                <div class="col-md-7">
                    <div class="single-form">
                        <input class="input" onblur="validateInput(event, __personalInfoSchema)" name="username" placeholder="Mentor Username">
                        <small class="text-danger text-capitalize" id="username-error">
                            @error('username')
                                {{$message}}
                            @enderror
                        </small>
                    </div>

                    <div class="single-form">
                        <input class="input" onblur="validateInput(event, __personalInfoSchema)" name="specialty" placeholder="What do you do?">
                        <small class="text-danger text-capitalize" id="specialty-error">
                            @error('specialty')
                                {{$message}}
                            @enderror
                        </small>
                    </div>

                    <div class="single-form">
                        <textarea class="textarea" onblur="validateInput(event, __personalInfoSchema)" name="desc" placeholder="Describe yourself briefly"></textarea>
                        <small class="text-danger text-capitalize" id="desc-error">
                            @error('desc')
                                {{$message}}
                            @enderror
                        </small>
                    </div>


                    <div class="row mt-3">
                        <h6 for="basic-url" class="form-label">Your Location Info </h6>
                        <div class="col-md-6">
                            <div class="single-form">
                                <input class="input" onblur="validateInput(event, __personalInfoSchema)" name="city" placeholder="City">
                                <small class="text-danger text-capitalize" id="city-error">
                                    @error('city')
                                        {{$message}}
                                    @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="single-form">
                                <input class="input" onblur="validateInput(event, __personalInfoSchema)" name="state" placeholder="Region or State">
                                <small class="text-danger text-capitalize" id="state-error">
                                    @error('state')
                                        {{$message}}
                                    @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="single-form">
                                <input class="input" onblur="validateInput(event, __personalInfoSchema)" name="country" placeholder="Country">
                                <small class="text-danger text-capitalize" id="country-error">
                                    @error('country')
                                        {{$message}}
                                    @enderror
                                </small>
                            </div>
                        </div>
                    </div>


                    <div class="single-form ">
                        <h6 for="basic-url" class="form-label">Social Media (Please provide only your username) </h6>

                        <div class="mb-3">
                            <div class="position-relative d-flex align-items-center">
                                <div class="position-absolute h-100 bg-transparent d-flex align-items-center">
                                    <p style="margin-left: 15px">Instagram</p>
                                </div>
                                <input type="text" onblur="validateInput(event, __personalInfoSchema)" name="instagram" class="form-control" style="padding-left: 22%" id="basic-url" aria-describedby="basic-addon3">
                            </div>
                            <small class="text-danger text-capitalize" id="instagram-error">
                                @error('instagram')
                                    {{$message}}
                                @enderror
                            </small>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex align-items-center border px-3 radius">
                                <div class="h-100 d-flex align-items-center">
                                    <p class="h-100">Facebook</p>
                                </div>
                                <input type="text" onblur="validateInput(event, __personalInfoSchema)" name="facebook" class="form-control border-0" id="basic-url" aria-describedby="basic-addon3">
                            </div>

                            <small class="text-danger text-capitalize" id="facebook-error">
                                @error('facebook')
                                    {{$message}}
                                @enderror
                            </small>
                        </div>

                        <div class="position-relative mb-3 d-flex align-items-center">
                            <div class="position-absolute h-100 bg-transparent d-flex align-items-center">
                                <p style="margin-left: 15px">Twitter</p>
                            </div>
                            <input type="text" onblur="validateInput(event, __personalInfoSchema)" name="twitter" class="form-control" style="padding-left: 17%" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                        <small class="text-danger text-capitalize" id="twitter-error">
                            @error('twitter')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                </div>

                <div class="col-md-4 mx-auto ">
                    <div class="position-relative overflow-hidden ratio ratio-1x1 radius">
                        <img class="radius position-absolute" style="object-fit: cover; object-position: center;" id="avatar_preview" src="{{asset('images/icon/user.png')}}" alt="Shape">
                    </div>

                    <div class="mt-2">
                        <label class="w-100 btn btn-primary " for="avatar">
                            Upload
                        </label>
                        <input name="avatar" onblur="validateInput(event, __personalInfoSchema)" onchange="setPreview(event)" type="file" class="form-control" hidden id="avatar">
                    </div>

                    <button type="button" onclick="removeImg()" class="btn btn-secondary mt-3 w-100">Remove Image</button>
                    <small class="text-danger text-capitalize" id="avatar-error">
                        @error('avatar')
                            {{$message}}
                        @enderror
                    </small>
                </div>
            </div>
        </div>

        <div class="single-form d-flex justify-content-end px-0">
            <button type="button" class="btn btn-primary" onclick="handleNext(validatePersonalInfo)">Next</button>
        </div>
    </div>
</div>
