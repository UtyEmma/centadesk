<x-student-layout>
    <x-page-title title="My Enrolled Courses - Learning Center" />
    <!-- Courses Start -->
    <div class="section section-padding pt-3">

        <div class="container">
            <!-- All Courses Tabs Menu Start -->
            <div class="courses-tabs-menu border border-primary courses-active p-3 mt-0">
                <h5>Enrolled Sessions</h5>
                <div>
                    <ul class="nav row gx-2">
                        <li class="col-4 col-md-auto"><button type="button" class="active px-md-5" data-bs-toggle="tab" data-bs-target="#tabs1">Ongoing</button></li>
                        <li class="col-4 col-md-auto"><button type="button" data-bs-toggle="tab" class="px-md-5" data-bs-target="#tabs2">Upcoming</button></li>
                        <li class="col-4 col-md-auto"><button type="button" data-bs-toggle="tab" class="px-md-5" data-bs-target="#tabs3">Previous</button></li>
                    </ul>
                </div>
            </div>
            <!-- All Courses Tabs Menu End -->

            <!-- All Courses tab content Start -->
            <div class="tab-content courses-tab-content">
                <div class="tab-pane fade show active" role="tabpanel" id="tabs1">
                    <div class="courses-wrapper ">
                        @if (count($courses['ongoing']) > 0)
                            <div class="courses-wrapper-02 p-4 radius border">
                                <div class="row">
                                    @forelse ($courses['ongoing'] as $course)
                                        <div class="col-md-4">
                                            <x-batch.ongoing :course="$course" />
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        @else
                            <div class="border radius p-5 text-center">
                                <div class="col-md-7 mx-auto">
                                    <h5>You do not have any ongoing Sessions!</h5>
                                    <p>Please click the button below to find some amazing upcoming sessions you might be interested in.</p>
                                    <a href="/sessions" class="btn btn-primary btn-hover-dark btn-custom">Find Sessions</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="tab-pane fade" id="tabs2">
                    <div class="courses-wrapper">
                        @if (count($courses['upcoming']) > 0)
                            <div class="courses-wrapper-02 p-4 radius border">
                                <div class="row">
                                    @forelse ($courses['upcoming'] as $course)
                                        <div class="col-md-4">
                                            <x-batch.upcoming :course="$course" />
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        @else
                            <div class="border radius p-5 text-center">
                                <div class="col-md-7 mx-auto">
                                    <h5>You do not have any upcoming Sessions!</h5>
                                    <p>Please click the button below to find some amazing upcoming sessions you might be interested in.</p>
                                    <a href="/sessions" class="btn btn-primary btn-hover-dark btn-custom">Find Sessions</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="tab-pane fade" id="tabs3">
                    <div class="courses-wrapper">
                        @if (count($courses['previous']) > 0)
                            <div class="courses-wrapper-02 p-4 radius border">
                                <div class="row">
                                    @forelse ($courses['previous'] as $course)
                                        <div class="col-lg-4 col-md-4">
                                            <x-batch.previous :course="$course" />
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        @else
                            <div class="border radius p-5 text-center">
                                <div class="col-md-7 mx-auto">
                                    <h5>You do not have any previous sessions!</h5>
                                    <p>Please click the button below to find some amazing upcoming sessions you might be interested in.</p>
                                    <a href="/sessions" class="btn btn-primary btn-hover-dark btn-custom">Find Sessions</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            @if (count($courses['ongoing']) > 0 || count($courses['upcoming']) > 0 || count($courses['previous']) > 0)
                <div class="row">
                </div>
            @else
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
