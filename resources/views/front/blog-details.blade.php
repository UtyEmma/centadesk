<x-guest-layout>
    <x-page-title title="{{$post->title}}" />
    <x-page-banner>
        <div class="d-md-flex justify-content-between align-items-end">
            <div class="m-0 page-banner-content w-100 d-md-flex justify-content-between align-items-end">
                <div class="col-md-10 mx-auto">
                    <h4 class="mt-0 mb-2 pb-0">Blog Post</h4>
                    <h3>{{$post->title}}</h3>
                </div>
            </div>
        </div>
    </x-page-banner>

    <div class="section section-padding pt-0">
        <div class="container">

            <div class="row flex-row-reverse gx-10">
                <div class="col-lg-10 mx-auto">
                    <div class="blog-details-wrapper mt-0">
                        <div class="blog-details-admin-meta ">
                            <div class="author">
                                <div class="author-thumb">
                                    <a href="#"><img src="{{$post->authorImage}}" alt="Author"></a>
                                </div>
                                <div class="author-name">
                                    <a class="name" href="#">{{$post->author}}</a>
                                </div>
                            </div>
                            <div class="blog-meta">
                                <span> <i class="icofont-calendar"></i> {{Date::parse($post->date)->format('jS M, Y')}}</span>
                            </div>
                        </div>

                        <div class="blog-details-description">
                           {!! $post->description !!}
                        </div>

                        <div class="blog-details-label">
                            <h4 class="label">Tags:</h4>
                            <ul class="tag-list">
                                @forelse ($post->categories as $category)
                                    <li class="w-auto px-1" ><a class="w-auto px-3">{{$category}}</a></li>
                                @empty
                                @endforelse

                            </ul>
                        </div>

                        @push('scripts')
                            <script>
                                function copyLink(){
                                    navigator.clipboard.writeText("{{request()->url()}}");

                                    new Notify ({
                                        text: "Copied Successfully!",
                                        effect: 'slide',
                                        status: 'success',
                                        autoclose: true,
                                        autotimeout: 3000,
                                        speed: 300 // animation speed
                                    })
                                }

                                async function shareLink(){
                                    shareData = {
                                        title: 'Hi, come join Libraclass',
                                        text: 'I am inviting you to join Libraclass',
                                        url: '{{request()->url()}}'
                                    }

                                    await navigator.share(shareData)
                                }
                            </script>
                        @endpush
                        <div class="blog-details-label">
                            <h4 class="label">Share:</h4>
                            <ul class="social">
                                <li><a onclick="copyLink()" style="cursor: pointer;"><i class="icofont-ui-copy"></i></a></li>
                                <li><a onclick="shareLink()" style="cursor: pointer;"><i class="icofont-share"></i></a></li>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

</x-guest-layout>
