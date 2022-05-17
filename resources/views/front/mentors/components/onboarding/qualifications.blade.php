<div class="row">

    @include('front.mentors.js.qualification-js')

    <div class="mx-auto px-0 row row-cols-1 gy-3">
        <div>
            <div class="px-0">
                <h5 class="mb-0">Your Qualifications</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente, nemo.</p>
            </div>

            <div class="py-5 px-0">
                <small id="qualification-section-error" class="text-danger text-capitalize"></small>

                <textarea name="qualification" hidden id="qualification-input" cols="30" rows="10"></textarea>

                <div class="row">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="single-form mt-0">
                                    <label for="" class="mb-1">Qualification</label>
                                    <input type="text" id="qualification" placeholder="Qualification" />
                                    <small id="qualification-error" class="text-danger"></small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="single-form">
                                    <label for="" class="mb-1">Awarding Institution</label>
                                    <input type="text" id="institution" placeholder="Institution" />
                                    <small id="institution-error" class="text-danger"></small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="single-form ">
                                    <label for="" class="mb-1">Year Acquired</label>
                                    <input type="date" class="form-control" id="date" placeholder="Year Acquired" />
                                    <small id="date-error" class="text-danger"></small>
                                </div>
                            </div>

                            {{-- <div class="col-md-12">
                                <div class="single-form">
                                    <label for="" class="mb-1">Description</label>
                                    <textarea name="" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div> --}}
                        </div>

                        <div class="mt-3">
                            <button class="btn btn-primary btn-hover-dark btn-custom" type="button" onclick="addQualificationItem()" >Add</button>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <input hidden  id="qualification_id" />
                        <div class="mb-2">
                            <h5 class="mb-0" >Qualifications</h5>
                            <p>Your qualifications will be displayed here!</p>
                        </div>

                        <div id="qualificationContainer">
                        </div>
                    </div>
                </div>
            </div>

            <div class="single-form d-flex justify-content-between px-0">
                <button type="button" class="btn btn-primary btn-hover-dark btn-custom" onclick="previous()">Previous</button>
                <button type="button" class="btn btn-primary btn-hover-dark btn-custom" onclick="handleNext(checkForQualifications)">Next</button>
            </div>
        </div>
    </div>
</div>
