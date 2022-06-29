<x-student-layout>
    <x-page-title title="My Profile - Learning Center" />
    <div class="section section-padding py-3">
        <div class="container">
            <form action="/profile/update" enctype="multipart/form-data" method="post">
                @csrf
                <div class="row">
                    <div class="mt-5">
                        <h4 class="text-right">Profile</h4>
                    </div>

                    <div class="col-md-6 border-right">
                        <div class="p-3 py-5">

                            @push('scripts')
                                <script>
                                    function setPreview(e){
                                        const preview = document.querySelector("#profile_img_preview");
                                        preview.src = URL.createObjectURL(e.target.files[0])
                                    }
                                </script>
                            @endpush

                            <div class="row align-items-center">
                                <div class="col-md-5 col-8 mx-auto mx-md-0 mb-3">
                                    <div class="rounded-circle border-primary border border-2 mx-auto p-1" style="height: 200px; width: 200px;">
                                        <div class="rounded-circle position-relative overflow-hidden h-100 w-100 p-0" >
                                            <img id="profile_img_preview" class="position-absolute w-100 h-100" style="object-fit: cover; object-position: center;" src="{{$user->avatar ?? asset('images/icon/avatar.png')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5 text-center">
                                    <label class="btn  btn-primary btn-hover-dark" for="avatarSelect">
                                        <input type="file" onchange="setPreview(event)" value="{{$user->avatar}}" name="avatar" hidden id="avatarSelect">
                                        Select Image
                                    </label>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-6 single-form px-0 pe-md-2">
                                    <label class="labels">First Name</label>
                                    <input type="text" required class="form-control" name="firstname" placeholder="First Name" value="{{$user->firstname}}">
                                </div>
                                <div class="col-md-6 single-form px-0">
                                    <label class="labels">Last Name</label>
                                    <input type="text" required class="form-control" name="lastname" value="{{$user->lastname}}" placeholder="Last Name">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="single-form px-0">
                                    <label class="labels">Email Address</label>
                                    <input type="email" required class="form-control" name="email" placeholder="Email Address" value="{{$user->email}}">
                                </div>

                                <div class="single-form px-0">
                                    <label class="labels">Headline</label>
                                    <input type="text" class="form-control" placeholder="'Engineer at Microsoft' or Architect" name="specialty" value="{{$user->specialty}}">
                                </div>

                                <div class="single-form px-0">
                                    <label class="labels">Bio</label>
                                    <textarea type="text" class="form-control" placeholder="Write a short description of your self" name="desc">{{$user->desc}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <x-social-media-input name="Facebook" placeholder="Username" value="{{$user->facebook}}" />
                        <x-social-media-input name="Twitter" placeholder="Username" value="{{$user->twitter}}" />
                        <x-social-media-input name="Instagram" placeholder="Username" value="{{$user->instagram}}" />

                        <div class="mt-5 text-end">
                            <button type="submit" href="/profile/update" class="btn btn-primary btn-hover-dark profile-button">Update Profile</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-student-layout>
