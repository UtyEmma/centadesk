<div class="row ">
    <div class="col-md-9 mx-auto px-0 row row-cols-1 gy-3">
        <div class="px-0">
            <h4>Personal Information Verification</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, nemo.</p>
        </div>

        <div class="border p-5" style="border-radius: 10px">
            <div>
                <h6 class="p-0">Personal Information</h6>
            </div>

            <div class="row">
                <div class="col-md-7">
                    <div class="single-form">
                        <input class="input" name="username" placeholder="Mentor Username">
                    </div>

                    <div class="single-form">
                        <input class="input" name="specialty" placeholder="What do you do?">
                    </div>

                    <div class="single-form">
                        <textarea class="textarea" name="desc" placeholder="Describe yourself briefly"></textarea>
                    </div>

                    <div class="single-form ">
                        <label for="basic-url" class="form-label">Social Media</label>

                        <div class="position-relative mb-3 d-flex align-items-center">
                            <div class="position-absolute h-100 bg-transparent d-flex align-items-center">
                                <p style="margin-left: 15px">Instagram</p>
                            </div>
                            <input type="text" name="instagram" class="form-control" style="padding-left: 25%" id="basic-url" aria-describedby="basic-addon3">
                        </div>

                        <div class="position-relative mb-3 d-flex align-items-center">
                            <div class="position-absolute h-100 bg-transparent d-flex align-items-center">
                                <p style="margin-left: 15px">Facebook</p>
                            </div>
                            <input type="text" name="facebook" class="form-control" style="padding-left: 25%" id="basic-url" aria-describedby="basic-addon3">
                        </div>

                        <div class="position-relative mb-3 d-flex align-items-center">
                            <div class="position-absolute h-100 bg-transparent d-flex align-items-center">
                                <p style="margin-left: 15px">Twitter</p>
                            </div>
                            <input type="text" name="twitter" class="form-control" style="padding-left: 25%" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mx-auto">
                    <div class="w-100 position-relative overflow-hidden" style="height: 200px; border-radius: 10px">
                        <img class="radius" src="{{asset('images/author/author-11.jpg')}}" alt="Shape">
                    </div>

                    <div class="mt-2">
                        <label class="w-100 btn btn-primary " for="inputGroupFile01">
                            Upload
                        </label>
                        <input name="avatar" type="file" class="form-control" hidden id="inputGroupFile01">
                    </div>
                </div>

            </div>

            <div class="single-form d-flex justify-content-end">
                <button type="button" class="btn btn-primary" onclick="next()">Next</button>
            </div>
        </div>
    </div>
</div>
