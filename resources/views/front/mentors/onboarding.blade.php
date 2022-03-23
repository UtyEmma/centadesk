<x-blank-layout>

    @include('front.mentors.js.onboarding-js')

    <section class="flex flex-column justify-content-center">
        <nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <div class="header-logo">
                            <a href="/"><img src="{{asset('images/logo.png')}}" alt="Logo"></a>
                        </div>
                    </div>

                    <div class="border-start col-auto">
                        <a class="navbar-brand" href="#">Signup to your new Mentor's account</a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="progress" style="height: 3px;">
        <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <div class="container">
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
                            <span class="bs-stepper-label">Qualifications</span>
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
                            <div class="container">
                                @include('front.mentors.components.onboarding.personal-info')
                            </div>
                        </div>

                        <div id="qualifications" class="content" role="tabpanel" aria-labelledby="qualifications-trigger">
                            <div class="container">
                                @include('front.mentors.components.onboarding.qualifications')
                            </div>
                        </div>


                        <div id="experience-item" class="content" role="tabpanel" aria-labelledby="experience-trigger">
                            <div class="container">
                                @include('front.mentors.components.onboarding.experience')
                            </div>
                        </div>

                        <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                            <div class="container">
                                @include('front.mentors.components.onboarding.kyc')
                            </div>
                        </div>

                        <div id="bank-info" class="content" role="tabpanel" aria-labelledby="bank-info-trigger">
                            <div class="container">
                                @include('front.mentors.components.onboarding.payment-info')
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    <section>

</x-blank-layout>
