<x-blank-layout>
    <!-- Error Start -->
    <div class="section section-padding mt-n10 h-vh">
        <div class="container">

            <!-- Error Wrapper Start -->
            <div class="error-wrapper">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <!-- Error Images Start -->
                        <div class="error-images">
                            <img src="{{asset('images/error.png')}}" alt="Error">
                        </div>
                        <!-- Error Images End -->
                    </div>
                    <div class="col-lg-6">
                        <!-- Error Content Start -->
                        <div class="error-content">
                            <h5 class="sub-title">Internal Server Error.</h5>
                            <h2 class="main-title">Sorry, we are having some <span> problems</span> communicating with the server.</h2>
                            <p>Please click the button below to return to go back to the home page.</p>
                            <a href="/" class="btn btn-primary btn-hover-dark">Back To Home</a>
                        </div>
                        <!-- Error Content End -->
                    </div>
                </div>
            </div>
            <!-- Error Wrapper End -->

        </div>
    </div>
    <!-- Error End -->
</x-blank-layout>
