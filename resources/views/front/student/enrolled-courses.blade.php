<x-student-layout>
    <x-page-title title="My Enrolled Courses - Learning Center" />
    <!-- Courses Start -->
    <div class="section section-padding pt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="courses-wrapper-02">
                        <div class="row">
                            <h5>Ongoing Batches</h5>

                            @forelse ($courses['ongoing'] as $course)
                                <div class="col-lg-6 col-md-6">
                                    <x-batch.ongoing :course="$course" />
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>

                    <div class="courses-wrapper-02">
                        <h5>Upcoming Batches</h5>

                        <div class="row">
                            @forelse ($courses['upcoming'] as $course)
                                <div class="col-lg-6 col-md-6">
                                    <x-batch.upcoming :course="$course" />
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="courses-wrapper-02">
                        <h5>Previous Batches</h5>

                        <div class="row">
                            @forelse ($courses['previous'] as $course)
                                <div class="col-12">
                                    <x-batch.previous :course="$course" />
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Courses End -->

</x-student-layout>
