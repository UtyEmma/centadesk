<div class="col-lg-4 col-md-6">

    <!-- Single Blog Start -->
    <div class="single-blog h-100">
        <div class="blog-image">
            <a href="/blog/{{$post->slug}}"><img src="{{$post->thumbnail}}" alt="Blog"></a>
        </div>
        <div class="blog-content">
            <div class="blog-author">
                <div class="author">
                    <div class="author-thumb">
                        <a href="#"><img src="{{$post->authorImage}}" alt="Author"></a>
                    </div>
                    <div class="author-name">
                        <a class="name" href="#">{{$post->author}}</a>
                    </div>
                </div>
                {{-- <div class="tag">
                    <a href="#">Science</a>
                </div> --}}
            </div>

            <h6 class="title"><a class="d-block text-truncate" href="/blog/{{$post->slug}}" >{{$post->title}}</a></h6>

            <div class="blog-meta">
                <span> <i class="icofont-calendar"></i> {{Date::parse($post->date)->format('jS M, Y')}}</span>
                {{-- <span> <i class="icofont-heart"></i> 2,568+ </span> --}}
            </div>

            <a href="/blog/{{$post->slug}}" class="btn btn-secondary btn-hover-primary">Read More</a>
        </div>
    </div>
    <!-- Single Blog End -->

</div>
