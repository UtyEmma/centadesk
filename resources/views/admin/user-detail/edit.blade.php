<x-admin.user-details :user="$user">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="/profile/update" enctype="multipart/form-data" method="post">
                    @csrf
                    <div >
                        <h4 class="">Profile</h4>
                    </div>

                    <div >
                        @push('scripts')
                            <script>
                                function setPreview(e){
                                    const preview = document.querySelector("#profile_img_preview");
                                    preview.src = URL.createObjectURL(e.target.files[0])
                                }
                            </script>
                        @endpush

                        <div class="row align-items-center">
                            <div class="col-md-5 col-8 mx-md-0 mb-3">
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
                            <div class="col-md-6 single-form">
                                <label class="labels">First Name</label>
                                <input type="text" required class="form-control" name="firstname" placeholder="First Name" value="{{$user->firstname}}">
                            </div>
                            <div class="col-md-6 single-form">
                                <label class="labels">Last Name</label>
                                <input type="text" required class="form-control" name="lastname" value="{{$user->lastname}}" placeholder="Last Name">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="form-group col-md-6">
                                <label class="labels">Email Address</label>
                                <input type="email" required class="form-control" name="email" placeholder="Email Address" value="{{$user->email}}">
                            </div>

                            <div class="form-group col-md-6">
                                <label class="labels">Headline</label>
                                <input type="text" class="form-control" placeholder="'Engineer at Microsoft' or Architect" name="specialty" value="{{$user->specialty}}">
                            </div>

                            <div class="form-group col-md-12" >
                                <label class="labels">Bio</label>
                                <textarea type="text" rows="5" class="form-control" placeholder="Write a short description of your self" name="desc">{{$user->desc}}</textarea>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Facebook</label>
                                <input type="text" name="Facebook" placeholder="Username" value="{{$user->facebook}}" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="">Twitter</label>
                                <input type="text" class="form-control" name="Twitter" placeholder="Username" value="{{$user->twitter}}">
                            </div>

                            <div class="col-md-4">
                                <label for="">Instagram</label>
                                <input type="text" name="Instagram" placeholder="Username" value="{{$user->instagram}}" class="form-control" />
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <div class="mt-5 text-end">
                            <button type="submit" href="/profile/update" class="btn btn-primary btn-hover-dark profile-button">Update Profile</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
</x-admin.user-details>
