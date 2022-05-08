<x-guest-layout>
    @include('front.mentors.js.onboarding-js')

    <div class="section page-banner bg-transparent py-0 my-0" >
        <div class="container pt-5">
            <div class="page-banner-content">
            </div>
        </div>

        <section class="section section-padding pt-3" >
            <div class="container">
                <div class="">
                    <h5 class="mb-0">Create your Mentor Account</h5>
                    <p class="my-0">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vel, provident.</p>
                    <div class="progress mt-2" style="height: 3px;">
                    <div class="progress-bar" role="progressbar" id="onboarding-progress" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <div class="pb-5">
                    <form action="/mentor/create" method="POST" enctype="multipart/form-data" class="card border-0">
                        @csrf
                        <div class="bs-stepper">
                            <div class="bs-stepper-header d-none" role="tablist">
                                <!-- your steps here -->
                                <div class="step" data-target="#logins-part">
                                    <button type="button" class="step-trigger p-0" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                                    <span class="bs-stepper-label">Personal Information</span>
                                    </button>
                                </div>

                                <div class="step" data-target="#qualifications">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="qualifications" id="qualifications-trigger">
                                    <span class="bs-stepper-label">Qualifications</span>
                                    </button>
                                </div>


                                <div class="step" data-target="#experience-item">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="experience-item" id="experience-trigger">
                                    <span class="bs-stepper-label">Experience</span>
                                    </button>
                                </div>

                                <div class="step" data-target="#information-part">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                                    <span class="bs-stepper-label">Payment Information</span>
                                    </button>
                                </div>

                                <div class="step" data-target="#bank-info">
                                    <button type="button" class="step-trigger" role="tab" aria-controls="bank-info" id="bank-info-trigger">
                                    <span class="bs-stepper-label">Bank Information</span>
                                    </button>
                                </div>
                            </div>

                            <div class="bs-stepper-content">
                                <!-- your steps content here -->
                                <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
                                    @include('front.mentors.components.onboarding.personal-info')
                                </div>

                                <div id="qualifications" class="content" role="tabpanel" aria-labelledby="qualifications-trigger">
                                    @include('front.mentors.components.onboarding.qualifications')
                                </div>


                                <div id="experience-item" class="content" role="tabpanel" aria-labelledby="experience-trigger">
                                    @include('front.mentors.components.onboarding.experience')
                                </div>

                                <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                                    @include('front.mentors.components.onboarding.kyc')
                                </div>

                                <div id="bank-info" class="content" role="tabpanel" aria-labelledby="bank-info-trigger">
                                    @include('front.mentors.components.onboarding.payment-info')
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <section>
    </div>
</x-guest-layout>
