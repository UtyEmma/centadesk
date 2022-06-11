<!-- Call to Action Start -->
<div class="section section-padding-02 mb-5">
    <div class="container">

        <!-- Call to Action Wrapper Start -->
        <div class="call-to-action-wrapper">

            <img class="cat-shape-01 animation-round" src="{{asset('images/shape/shape-12.png')}}" alt="Shape">
            <img class="cat-shape-02" src="{{asset('images/shape/shape-13.svg')}}" alt="Shape">
            <img class="cat-shape-03 animation-round" src="{{asset('images/shape/shape-12.png')}}" alt="Shape">

            <div class="row align-items-center">
                <div class="col-md-6">

                    <!-- Section Title Start -->
                    <div class="section-title shape-02">
                        @if (Auth::user()->role !== 'mentor')
                        <h5 class="sub-title">Become A Mentor</h5>
                        <h2 class="main-title">Start selling your courses <span>on Libraclass</span></h2>
                        @else
                        <h5 class="sub-title">Your students are waiting</h5>
                        <h2 class="main-title">Continue creating amazing courses <span>on Libraclass</span></h2>
                        @endif
                    </div>
                    <!-- Section Title End -->

                </div>
                <div class="col-md-6">
                    <div class="call-to-action-btn">
                        @if (Auth::user()->role !== 'mentor')
                            <a class="btn btn-primary btn-hover-dark" href="/mentor/onboarding">Become a Mentor</a>
                        @else
                            <a class="btn btn-primary btn-hover-dark" href="/me/courses/create">Create a Course</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to Action Wrapper End -->
    </div>
</div>
<!-- Call to Action End -->
