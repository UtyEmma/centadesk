@push('scripts')
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
@endpush

<ul class="social mt-0 justify-content-start">
    <li><a href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}" target="_blank" rel="noopener noreferrer"><i class="flaticon-facebook"></i></a></li>
    <li><a href="https://www.linkedin.com/sharing/share-offsite/?url={{Request::url()}}" target="_blank" rel="noopener noreferrer"><i class="flaticon-linkedin"></i></a></li>
    <li><a href="https://twitter.com/share?ref_src=twsrc%5Etfw" data-text="{{$text}}" data-hashtags="{{$tags[0]}}" data-url="{{request()->url()}}" target="_blank" rel="noopener noreferrer"><i class="flaticon-twitter" data-lang="en" data-show-count="false"></i></a></li>
    {{-- <li><a href="#"><i class="flaticon-skype"></i></a></li> --}}
    {{-- <li><a href="#"><i class="flaticon-instagram"></i></a></li> --}}
</ul>
