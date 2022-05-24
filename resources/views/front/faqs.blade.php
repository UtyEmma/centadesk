<x-guest-layout>
    <x-page-title title="Frequently Asked Questions - Libraclass, Create and sell online courses" />
    <div class="section page-banner bg-transparent">
        <div class="container mt-5">
            <div class="page-banner-content py-5">
                <ul class="breadcrumb mt-5">
                    <li><a href="/">Home</a></li>
                    <li class="active">FAQ</li>
                </ul>
                <h2 class="title">Frequently Asked <span>Question.</span></h2>
            </div>
        </div>
    </div>

    <!-- FAQ Start -->
    <div class="section section-padding pt-0">
        <div class="container">

            <!-- FAQ Tab Menu Start -->
            <div class="faq-tab-menu">
                <ul class="nav nav-justified">
                    <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab1">For Students</button></li>
                    <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab2">For Mentors</button></li>
                </ul>
            </div>
            <!-- FAQ Tab Menu End -->

            <!-- FAQ Tab Content Start -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab1">
                    <!-- FAQ Wrapper Start -->
                    <div class="faq-wrapper">
                        @forelse ($students as $student)
                            <x-faq :title="$student->title">
                                {{$student->content}}
                            </x-faq>
                            @empty
                            @endforelse
                    </div>
                    <!-- FAQ Wrapper End -->
                </div>
                <div class="tab-pane fade" id="tab2">
                        <!-- FAQ Wrapper Start -->
                    <div class="faq-wrapper">
                        @forelse ($mentors as $mentor)
                            <x-faq :title="$mentor->title">
                                {{$mentor->content}}
                            </x-faq>
                        @empty
                        @endforelse
                    </div>
                    <!-- FAQ Wrapper End -->
                </div>
            </div>
            <!-- FAQ Tab Content End -->

            <!-- FAQ Button End -->
            {{-- <div class="faq-btn text-center">
                <a class="btn btn-primary btn-hover-dark" href="#">Other’s Question</a>
            </div> --}}
            <!-- FAQ Button End -->

        </div>
    </div>
    <!-- FAQ End -->
</x-guest-layout>
