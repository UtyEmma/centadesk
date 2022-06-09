<x-student-layout>
    <x-page-title title="My Enrolled Courses - Learning Center" />
    <!-- Courses Start -->
    <div class="section section-padding pt-3">

        <div class="container">
            <div>
                <h5>My Enrolled Sessions</h5>
            </div>

            @if (count($courses['ongoing']) > 0 || count($courses['ongoing']) > 0 || count($courses['previous']) > 0)
                <div class="row">
                    @if (count($courses['ongoing']) > 0)
                        <div class="courses-wrapper-02">
                            <div class="row">
                                <h5>Ongoing Sessions</h5>

                                @forelse ($courses['ongoing'] as $course)
                                    <div class="col-md-4">
                                        <x-batch.ongoing :course="$course" />
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    @endif

                    @if (count($courses['ongoing']) > 0)
                        <div class="courses-wrapper-02">
                            <h5>Upcoming Sessions</h5>

                            <div class="row">
                                @forelse ($courses['upcoming'] as $course)
                                    <div class="col-md-4">
                                        <x-batch.upcoming :course="$course" />
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    @endif


                    @if (count($courses['previous']) > 0)
                        <div class="courses-wrapper-02">
                            <h5>Previous Sessions</h5>

                            <div class="row">
                                @forelse ($courses['previous'] as $course)
                                    <div class="col-lg-4 col-md-4">
                                        <x-batch.previous :course="$course" />
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    @endif
                </div>
            @else
                <div class="border radius p-5 text-center">
                    <div class="col-md-7 mx-auto">
                        <h5>You have not Enrolled for any Sessions Yet!</h5>
                        <p>Please click the button below to find some amazing upcoming sessions you might be interested in.</p>
                        <a href="/sessions" class="btn btn-primary btn-hover-dark btn-custom">Find Sessions</a>
                    </div>
                </div>
            @endif

            @if ($suggested->count() > 0)
                <div class="py-5">

                    <!-- All Courses Tabs Menu Start -->
                        <div class="d-flex justify-content-between align-content-center mb-4">
                            <h5>Here are some suggested Sessions you might be interested in.</h5>
                        </div>
                        <ul class="row">
                            @forelse ($suggested as $course)
                                <div class="col-lg-4 col-md-4 pe-0">
                                    <x-batch.suggested :btn="true" :course="$course" />
                                </div>
                            @empty
                            @endforelse
                        </ul>
                </div>
            @endif
        </div>
    </div>
    <!-- Courses End -->

</x-student-layout>
