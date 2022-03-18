<div class="row ">

    <script>

        function getInputs(name){
            return document.querySelector('#'+name)
        }

        function setPreview(e){
            const preview = document.querySelector("#avatar_preview");
            preview.src = URL.createObjectURL(e.target.files[0])
        }

        function removeImg(){
            const input = document.querySelector('input[name="avatar"]')
            const image = document.querySelector("#avatar_preview")
            // let files = Array.from(image.files)
            image.src = "{{asset('images/author/author-11.jpg')}}"
        }

        const fileNames = ['username', 'specialty', 'desc', 'instagram', 'facebook', 'twitter', 'avatar']
    </script>

    <div class="col-md-9 mx-auto px-0 row row-cols-1 gy-3">
        <div class="px-0">
            <h4>Personal Information</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, nemo.</p>
        </div>

        <div class="border p-5 radius">
            <div>
                <h6 class="p-0">Personal Information</h6>
            </div>

            <div class="row">
                <div class="col-md-7">
                    <div class="single-form">
                        <input class="input" name="username" placeholder="Mentor Username">
                        <small class="text-danger text-capitalize" id="error-username">
                            @error('username')
                                {{$message}}
                            @enderror
                        </small>
                    </div>

                    <div class="single-form">
                        <input class="input" name="specialty" placeholder="What do you do?">
                        <small class="text-danger text-capitalize" id="error-specialty">
                            @error('specialty')
                                {{$message}}
                            @enderror
                        </small>
                    </div>

                    <div class="single-form">
                        <textarea class="textarea" name="desc" placeholder="Describe yourself briefly"></textarea>
                        <small class="text-danger text-capitalize" id="error-desc">
                            @error('desc')
                                {{$message}}
                            @enderror
                        </small>
                    </div>

                    <div class="single-form ">
                        <h6 for="basic-url" class="form-label">Social Media (Please provide only your username) </h6>

                        <div class="mb-3">
                            <div class="position-relative d-flex align-items-center">
                                <div class="position-absolute h-100 bg-transparent d-flex align-items-center">
                                    <p style="margin-left: 15px">Instagram</p>
                                </div>
                                <input type="text" name="instagram" class="form-control" style="padding-left: 22%" id="basic-url" aria-describedby="basic-addon3">
                            </div>
                            <small class="text-danger text-capitalize" id="error-instagram">
                                @error('instagram')
                                    {{$message}}
                                @enderror
                            </small>
                        </div>

                        <div class="mb-3">
                            <div class="position-relative d-flex align-items-center">
                                <div class="position-absolute h-100 bg-transparent d-flex align-items-center">
                                    <p style="margin-left: 15px">Facebook</p>
                                </div>
                                <input type="text" name="facebook" class="form-control" style="padding-left: 22%" id="basic-url" aria-describedby="basic-addon3">
                            </div>
                            <small class="text-danger text-capitalize" id="error-facebook">
                                @error('facebook')
                                    {{$message}}
                                @enderror
                            </small>
                        </div>

                        <div class="position-relative mb-3 d-flex align-items-center">
                            <div class="position-absolute h-100 bg-transparent d-flex align-items-center">
                                <p style="margin-left: 15px">Twitter</p>
                            </div>
                            <input type="text" name="twitter" class="form-control" style="padding-left: 17%" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                        <small class="text-danger text-capitalize" id="error-twitter">
                            @error('twitter')
                                {{$message}}
                            @enderror
                        </small>
                    </div>
                </div>

                <div class="col-md-4 mx-auto">
                    <div class="position-relative overflow-hidden ratio ratio-1x1 radius">
                        <img class="radius position-absolute h-100" id="avatar_preview" src="{{asset('images/author/author-11.jpg')}}" alt="Shape">
                    </div>

                    <div class="mt-2">
                        <label class="w-100 btn btn-primary " for="avatar">
                            Upload
                        </label>
                        <input name="avatar" accept="image/*" onchange="setPreview(event)" type="file" class="form-control" hidden id="avatar">
                    </div>

                    <button type="button" onclick="removeImg()" class="btn btn-secondary mt-3 w-100">Remove Image</button>
                    <small class="text-danger text-capitalize" id="error-avatar">
                        @error('avatar')
                            {{$message}}
                        @enderror
                    </small>
                </div>
            </div>
        </div>

        <div class="single-form d-flex justify-content-end">
            <button type="button" class="btn btn-primary" onclick="next()">Next</button>
        </div>
    </div>
</div>
