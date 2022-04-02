@push('styles')
    <link href="https://vjs.zencdn.net/7.18.1/video-js.css" rel="stylesheet" />
@endpush

<video id="my-video" class="video-js" controls width="auto" height="264" poster="{{asset('images/about.jpg')}}" data-setup="{}" class="mx-auto"
  >
    <source src="" type="video/mp4" />
    <source src="" type="video/webm" />
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a
      web browser that
      <a href="https://videojs.com/html5-video-support/" target="_blank"
        >supports HTML5 video</a
      >
    </p>
</video>

@push('scripts')
    <script src="https://vjs.zencdn.net/7.18.1/video.min.js"></script>
@endpush
