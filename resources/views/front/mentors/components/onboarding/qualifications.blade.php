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
                        </div>

                        <div class="mt-3">
                            <button class="btn btn-primary btn-hover-dark btn-custom" type="button" onclick="addQualificationItem()" >Add</button>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <input hidden  id="qualification_id" />

                        <div id="qualificationContainer" class="p-3 mt-5 mt-md-0 bg-light-primary h-100 radius">
                            <div id="qualificationDefault">
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="mb-2 p-5 text-center">
                                        <div class="col-6 mx-auto mb-3">
                                            <img src="{{asset('images/icon/education.svg')}}" alt="">
                                        </div>

                                        <h5 class="my-2" >Add Your Qualifications</h5>
                                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsam totam commodi odio voluptatibus minus ducimus culpa sed, fugiat.</p>
                                    </div>
                                </div>
                            </div>
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
