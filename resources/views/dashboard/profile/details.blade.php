<x-mentor-profile>
    <form action="/me/account/update" method="POST" >
        <div class="row">
            @csrf
            <div class="col-xl-4">
                <x-page-title title="Mentor Dashboard - My Profile" />
                <!-- Profile picture card-->
                <h5 class="mb-3">Profile Picture</h5>
                <div class="card mb-4 mb-xl-0 radius p-4">
                    <div class="card-body text-center">
                        <div class="col-md-9 col-8 mx-auto ">
                            <div class="position-relative overflow-hidden ratio ratio-1x1 rounded-circle mb-5">
                                <img class="radius position-absolute" style="object-fit: cover; object-position: center;" id="avatar_preview" src="{{$user->avatar ?? asset('images/icon/user.png')}}" alt="Shape">
                            </div>

                            <div class="mt-5">
                                <label class="w-100 btn btn-primary " for="avatar">
                                    Upload New Image
                                </label>
                                <input name="avatar" onblur="validateInput(event, __personalInfoSchema)" onchange="setPreview(event)" type="file" class="form-control" hidden id="avatar">
                            </div>
                            <small class="text-danger text-capitalize" id="avatar-error">
                                @error('avatar')
                                    {{$message}}
                                @enderror
                            </small>
                        </div>
                    </div>
                </div>

                <div class="message text-center mt-3">
                    <div>
                        <div>
                            <div class="text-center">
                                {{-- <img src="{{asset('images/menu-icon/icon-6.png')}}" alt=""> --}}
                                <h5 class="my-0 ms-3">Account Verification Status</h5>
                            </div>
                        </div>

                        @if ($user->is_verified === 'unverified')
                            <div class="p-3 text-center px-0">
                                <p>Your Mentor Account is not verified! Click the button below to request verification.</p>
                                <a href="/me/verify" class="btn btn-primary btn-hover-dark w-100 btn-custom">Request Verification</a>
                            </div>
                        @elseif ($user->is_verified === 'requested')
                            <div class="p-3 text-center px-0">
                                <p>Your Verification request is Pending!</p>
                            </div>
                        @elseif ($user->is_verified === 'verified')
                            <div class="p-3 text-center px-0">
                                <p>Your Mentor Account has been Verified!</p>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- Message End -->
            </div>

            <div class="col-xl-8">
                <h5 class="mb-3">Account Details</h5>
                        <div>
                            <h6 class="p-0">Personal Information</h6>
                        </div>
                        <div class="card mb-4 radius">
                            <div class="card-body row">
                                <div class="single-form col-md-6">
                                    <label for="">Username</label>
                                    <input class="input" onblur="validateInput(event, __personalInfoSchema)" value="{{$user->username}}" name="username" placeholder="Mentor Username">
                                    <small class="text-danger text-capitalize" id="username-error">
                                        @error('username')
                                            {{$message}}
                                        @enderror
                                    </small>
                                </div>

                                <div class="single-form col-md-6">
                                    <label for="">Specialty</label>
                                    <input class="input" onblur="validateInput(event, __personalInfoSchema)" value="{{$user->specialty}}" name="specialty" placeholder="What do you do?">
                                    <small class="text-danger text-capitalize" id="specialty-error">
                                        @error('specialty')
                                            {{$message}}
                                        @enderror
                                    </small>
                                </div>

                                <div class="single-form">
                                    <label for="">Personal Bio</label>
                                    <textarea class="textarea" onblur="validateInput(event, __personalInfoSchema)" name="desc" placeholder="Describe yourself briefly">{{$user->desc}}</textarea>
                                    <small class="text-danger text-capitalize" id="desc-error">
                                        @error('desc')
                                            {{$message}}
                                        @enderror
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4 radius">
                            <div class="card-body row">
                                <h6 for="basic-url" class="form-label">Your Location Info </h6>
                                <div class="col-md-4">
                                    <div class="single-form">
                                        <label for="">City</label>
                                        <input class="input" onblur="validateInput(event, __personalInfoSchema)" value="{{$user->city}}" name="city" placeholder="City">
                                        <small class="text-danger text-capitalize" id="city-error">
                                            @error('city')
                                                {{$message}}
                                            @enderror
                                        </small>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="single-form">
                                        <label for="">State</label>
                                        <input class="input" onblur="validateInput(event, __personalInfoSchema)" value="{{$user->state}}" name="state" placeholder="Region or State">
                                        <small class="text-danger text-capitalize" id="state-error">
                                            @error('state')
                                                {{$message}}
                                            @enderror
                                        </small>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="single-form">
                                        <label for="">Country</label>
                                        <input class="input" onblur="validateInput(event, __personalInfoSchema)" value="{{$user->country}}" name="country" placeholder="Country">
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
                            <h6 for="basic-url" class="form-label">Social Media (Please provide only your username) </h6>

                            <div class="card mb-4 radius">
                                <div class="card-body row">
                                    <div class="col-md-4">
                                        <div class="single-form">
                                            <label for="">Instagram</label>
                                                <input type="text" class="form-control" id="facebook-input" onblur="validateInput(event, __personalInfoSchema)" name="instagram" placeholder="Username" value="{{$user->instagram}}" aria-describedby="instagram" value="">
                                        </div>
                                        <small class="text-danger text-capitalize" id="instagram-error">
                                            @error('instagram')
                                                {{$message}}
                                            @enderror
                                        </small>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="single-form">
                                            <label for="">Facebook</label>
                                            <input type="text" class="form-control" id="facebook-input" onblur="validateInput(event, __personalInfoSchema)" name="facebook" placeholder="Username" value="{{$user->facebook}}" aria-describedby="facebook" value="">
                                        </div>
                                        <small class="text-danger text-capitalize" id="facebook-error">
                                            @error('facebook')
                                                {{$message}}
                                            @enderror
                                        </small>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="single-form">
                                            <label for="">Twitter</label>
                                            <input type="text" class="form-control" id="twitter-input" onblur="validateInput(event, __personalInfoSchema)" name="twitter" placeholder="Username" value="{{$user->twitter}}" aria-describedby="twitter" value="">
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

                        <div class="text-end">
                            <button class="btn btn-primary btn-custom btn-hover-dark" type="button">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-mentor-profile>
