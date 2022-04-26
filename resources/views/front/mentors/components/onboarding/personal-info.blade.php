<div class="row">

    @include('front.mentors.js.personal-info-js')

    @php
        $user = Auth::user();
    @endphp

    <div class="col-md-9 mx-auto px-0 row row-cols-1 gy-3">
        <div class="px-0">
            <h5 class="mb-0">Personal Information</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, nemo.</p>
        </div>

        <div class="border p-3 py-5 p-md-5 radius">
            <div class="row">
                <div class="col-8 col-md-4 mx-auto">
                    <div class="rounded-circle p-1 border border-3 border-primary">
                        <div class="position-relative overflow-hidden ratio ratio-1x1 rounded-circle">
                            <img class="radius position-absolute" style="object-fit: cover; object-position: center;" id="avatar_preview" src="{{$user->avatar ?? asset('images/icon/user.png')}}" alt="Shape">
                        </div>
                    </div>

                    <div class="mt-2">
                        <label class="w-100 btn btn-primary btn-hover-dark" for="avatar">
                            Upload
                        </label>
                        <input name="avatar"  onblur="validateInput(event, __personalInfoSchema)" onchange="setPreview(event)" type="file" class="form-control" hidden id="avatar">
                    </div>

                    <button type="button" onclick="removeImg()" class="btn btn-secondary btn-hover-primary mt-3 w-100">Remove Image</button>
                    <small class="text-danger text-capitalize" id="avatar-error">
                        @error('avatar')
                            {{$message}}
                            @enderror
                    </small>
                </div>

                <div class="col-md-7">
                    <h6 for="basic-url" class="form-label mt-3 mt-md-0">Your Personal Information </h6>
                    <div class="single-form">
                        <input class="input" onblur="validateInput(event, __personalInfoSchema)" value="{{$user->username ?? old('username')}}" name="username" placeholder="Mentor Username">
                        <small class="text-danger text-capitalize" id="username-error">
                            @error('username')
                                {{$message}}
                            @enderror
                        </small>
                    </div>

                    <div class="single-form">
                        <input class="input" onblur="validateInput(event, __personalInfoSchema)" value="{{$user->specialty ?? old('specialty')}}" name="specialty" placeholder="What do you do?">
                        <small class="text-danger text-capitalize" id="specialty-error">
                            @error('specialty')
                                {{$message}}
                            @enderror
                        </small>
                    </div>

                    <div class="single-form">
                        <textarea class="textarea" onblur="validateInput(event, __personalInfoSchema)" name="desc"  placeholder="Describe yourself briefly">{{$user->desc ?? old('desc')}}</textarea>
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
                            <div class="single-form">
                                <div class="input-group mb-3">
                                    <span  class="input-group-text px-3 fs-6 radius-left bg-white border border-end-0" id="instagram">Instagram</span>
                                    <input type="text" class="form-control w-auto border-start-0" id="facebook-input" onblur="validateInput(event, __personalInfoSchema)" name="instagram" placeholder="Username" value="{{$user->instagram ?? old('instagram')}}" aria-describedby="instagram" value="">
                                </div>
                            </div>
                            <small class="text-danger text-capitalize" id="instagram-error">
                                @error('instagram')
                                    {{$message}}
                                @enderror
                            </small>
                        </div>

                        <div class="mb-3">
                            <div class="single-form">
                                <div class="input-group mb-3">
                                    <span  class="input-group-text px-3 fs-6 radius-left bg-white border border-end-0" id="facebook">Facebook</span>
                                    <input type="text" class="form-control w-auto border-start-0" id="facebook-input" value="{{$user->facebook ?? old('facebook')}}"facebook onblur="validateInput(event, __personalInfoSchema)" name="facebook" placeholder="Username" aria-describedby="facebook" value="">
                                </div>
                            </div>

                            <small class="text-danger text-capitalize" id="facebook-error">
                                @error('facebook')
                                    {{$message}}
                                @enderror
                            </small>
                        </div>


                        <div class="mb-3">
                            <div class="single-form">
                                <div class="input-group mb-3">
                                    <span  class="input-group-text px-3 fs-6 radius-left bg-white border border-end-0" id="twitter">Twitter</span>
                                    <input type="text" class="form-control w-auto border-start-0" id="twitter-input" value="{{$user->twitter ?? old('twitter')}}" onblur="validateInput(event, __personalInfoSchema)" name="twitter" placeholder="Username" aria-describedby="twitter" value="">
                                </div>
                            </div>
                            <small class="text-danger text-capitalize" id="twitter-error">
                                @error('twitter')
                                    {{$message}}
                                @enderror
                            </small>
                        </div>

                        {{-- <div class="mb-3">
                            <div class="single-form">
                                <div class="input-group mb-3">
                                    <span  class="input-group-text px-3 fs-6 radius-left bg-white border border-end-0" id="linkedin">LinkedIn</span>
                                    <input type="text" class="form-control w-auto border-start-0" id="twitter-input" value="{{$user->linkedin ?? old('linkedin')}}" onblur="validateInput(event, __personalInfoSchema)" name="linkedin" placeholder="Username" aria-describedby="linkedin" value="">
                                </div>
                            </div>
                            <small class="text-danger text-capitalize" id="linkedin-error">
                                @error('linkedin')
                                    {{$message}}
                                @enderror
                            </small>
                        </div> --}}
                    </div>
                </div>

            </div>
        </div>

        <div class="single-form d-flex justify-content-end px-0">
            <button type="button" class="btn btn-primary btn-hover-dark" onclick="handleNext(validatePersonalInfo)">Next</button>
        </div>
    </div>
</div>
