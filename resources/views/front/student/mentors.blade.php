<x-student-layout>
<!-- Courses Start -->
<div class="section section-padding pt-0">
    <div class="container">
        <!-- Courses Wrapper Start  -->
        <div class="courses-wrapper-02 pt-0">
            <div class="row">
                @foreach ($mentors as $mentor)
                    <div class="col-md-4">
                        <!-- Single Team Start -->
                        <div class="single-team py-5 radius border mt-0">
                            <div class="team-thumb">
                                <img src="{{asset('images/author/author-04.jpg')}}" alt="Author">
                            </div>
                            <div class="team-content">
                                <div class="rating">
                                    <span class="count">{{$mentor->avg_rating}}.0</span>
                                    <i class="icofont-star"></i>
                                    <span class="text">({{$mentor->total_reviews}} reviews)</span>
                                </div>
                                <h4 class="name">{{$mentor->firstname}} {{$mentor->lastname}}</h4>
                                <span class="designation">BBS, Instructor</span>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <p>{{$mentor->total_batches}} Batch</p>
                                </div>

                                <div class="col-6">
                                    <p>{{$mentor->total_students}}</p>
                                </div>
                            </div>
                            {{-- <div class="courses-author">
                                <div class="author">
                                    <div class="author-name">
                                        <a class="name" href="#">Jason Williams</a>
                                        <a class="name-2" href="#">Ohula Malsh</a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <!-- Single Team End -->
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Courses Wrapper End  -->

    </div>
</div>
<!-- Courses End -->

</x-student-layout>
