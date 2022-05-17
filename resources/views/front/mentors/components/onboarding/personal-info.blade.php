<div class="row">

    @include('front.mentors.js.personal-info-js')

    @php
        $user = Auth::user();
    @endphp

    <div class="mx-auto px-0 row row-cols-1 gy-3">
        <div class="pt-5 py-md-5">
            <div class="row">
                <div class="col-md-3 mx-auto">
                    <div class="row">
                        <div class="col-md-12 col-7">
                            <div class="rounded-circle p-1 border border-3 border-primary">
                                <div class="position-relative overflow-hidden ratio ratio-1x1 rounded-circle">
                                    <img class="radius position-absolute" style="object-fit: cover; object-position: center;" id="mentor-avatar" src="{{$user->avatar ?? asset('images/icon/avatar.png')}}" alt="Shape" />
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 col-5 d-flex align-items-center justify-content-center">
                            <div class="mt-2">
                                <label class="w-100 btn btn-primary btn-hover-dark" style="font-size: 14px; line-height: 3.5;" for="avatar">
                                    Upload
                                </label>
                                <input name="avatar"  onblur="validateInput(event, __personalInfoSchema)" onchange="setPreview(event)" type="file" class="form-control" hidden id="avatar">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 offset-md-1">
                    <h5 for="basic-url" class="form-label mt-3 mt-md-0">Your Personal Information </h5>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="single-form mt-2">
                                <label for="" class="mb-1">Username</label>
                                <input class="input" onblur="validateInput(event, __personalInfoSchema)" value="{{$user->username ?? old('username')}}" name="username" placeholder="Mentor Username">
                                <small class="text-danger text-capitalize" id="username-error">
                                    @error('username')
                                        {{$message}}
                                        @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="single-form mt-2">
                                <label for="" class="mb-1">Specialty</label>
                                <input class="input" onblur="validateInput(event, __personalInfoSchema)" value="{{$user->specialty ?? old('specialty')}}" name="specialty" placeholder="What do you do?">
                                <small class="text-danger text-capitalize" id="specialty-error">
                                    @error('specialty')
                                        {{$message}}
                                    @enderror
                                </small>
                            </div>
                        </div>
                    </div>

                    <div class="single-form">
                        <label for="" class="mb-1">Bio</label>
                        <textarea class="textarea" onblur="validateInput(event, __personalInfoSchema)" name="desc"  placeholder="Describe yourself briefly">{{$user->desc ?? old('desc')}}</textarea>
                        <small class="text-danger text-capitalize" id="desc-error">
                            @error('desc')
                                {{$message}}
                            @enderror
                        </small>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="single-form">
                                <label for="" class="mb-1">Portfolio or Website URL</label>
                                <input class="form-control" onblur="validateInput(event, __personalInfoSchema)" name="website"  placeholder="Your Website Link" value="{{$user->website ?? old('website')}}">
                                <small class="text-danger text-capitalize" id="website-error">
                                    @error('website')
                                        {{$message}}
                                    @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="single-form">
                                <label for="" class="mb-1">Resume or CV URL</label>
                                <input class="form-control" onblur="validateInput(event, __personalInfoSchema)" name="resume"  placeholder="Link to your CV or Resume" value="{{$user->resume ?? old('resume')}}">
                                <small class="text-danger text-capitalize" id="resume-error">
                                    @error('resume')
                                        {{$message}}
                                    @enderror
                                </small>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <p for="basic-url" class="form-label">Your Location Info </p>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="single-form mt-2">
                                    <label for="" class="mb-1">City</label>
                                    <input class="input form-control" onblur="validateInput(event, __personalInfoSchema)" name="city" placeholder="City">
                                    <small class="text-danger text-capitalize" id="city-error">
                                        @error('city')
                                            {{$message}}
                                        @enderror
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="single-form mt-2">
                                    <label for="" class="mb-1">Region or State</label>
                                    <input class="input form-control" onblur="validateInput(event, __personalInfoSchema)" name="state" placeholder="Region or State">
                                    <small class="text-danger text-capitalize" id="state-error">
                                        @error('state')
                                            {{$message}}
                                        @enderror
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="single-form mt-2">
                                    <label for="" class="mb-1">Country</label>
                                    <input class="input form-control" onblur="validateInput(event, __personalInfoSchema)" name="country" placeholder="Country">
                                    <small class="text-danger text-capitalize" id="country-error">
                                        @error('country')
                                            {{$message}}
                                        @enderror
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="single-form ">
                        <p for="basic-url" class="form-label">Social Media <small>(Please provide only your username)</small> </p>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="single-form mt-2">
                                    <label for="" class="mb-1">Instagram</label>
                                    <input type="text" class="form-control" id="facebook-input" onblur="validateInput(event, __personalInfoSchema)" name="instagram" placeholder="Username" value="{{$user->instagram ?? old('instagram')}}" aria-describedby="instagram" value="">
                                </div>
                                <small class="text-danger text-capitalize" id="instagram-error">
                                    @error('instagram')
                                        {{$message}}
                                    @enderror
                                </small>
                            </div>

                            <div class="col-md-4">
                                <div class="single-form mt-2">
                                    <label for="" class="mb-1">Facebook</label>
                                    <input type="text" class="form-control" id="facebook-input" value="{{$user->facebook ?? old('facebook')}}"facebook onblur="validateInput(event, __personalInfoSchema)" name="facebook" placeholder="Username" aria-describedby="facebook" value="">
                                </div>
                                <small class="text-danger text-capitalize" id="facebook-error">
                                    @error('facebook')
                                        {{$message}}
                                    @enderror
                                </small>
                            </div>

                            <div class="col-md-4">
                                <div class="single-form mt-2">
                                    <label for="" class="mb-1">Twitter</label>
                                    <input type="text" class="form-control" id="twitter-input" value="{{$user->twitter ?? old('twitter')}}" onblur="validateInput(event, __personalInfoSchema)" name="twitter" placeholder="Username" aria-describedby="twitter" value="">
                                </div>
                                <small class="text-danger text-capitalize" id="twitter-error">
                                    @error('twitter')
                                        {{$message}}
                                    @enderror
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-form col-12 d-flex justify-content-end mt-2">
            <button type="button" class="btn btn-primary btn-hover-dark btn-custom" onclick="handleNext(validatePersonalInfo)">Next</button>
        </div>
    </div>
</div>
