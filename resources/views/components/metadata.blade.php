@push('meta')
        <!--  Essential META Tags -->
        <meta property="og:title" content="{{$title}}">
        <meta property="og:type" content="article" />
        <meta property="og:image" content="{{$image}}">
        <meta property="og:url" content="{{request()->url()}}">
        <meta name="twitter:card" content="summary_large_image">

        <!--  Non-Essential, But Recommended -->
        <meta property="og:description" content="{{$excerpt}}">
        <meta property="og:site_name" content="{{config('app.name', 'Centadesk')}}">
        <meta name="twitter:image:alt" content="{{$title}}">

        <!--  Non-Essential, But Required for Analytics -->
        {{-- <meta property="fb:app_id" content="your_app_id" />
        <meta name="twitter:site" content="@website-username"> --}}

        <meta name="description" content="{{$excerpt}}" />

        <!-- Twitter Card data -->
        <meta name="twitter:card" content="{{$excerpt}}">
        {{-- <meta name="twitter:site" content="@publisher_handle"> --}}
        <meta name="twitter:title" content="{{$title}}">
        <meta name="twitter:description" content="{{$excerpt}}">
        {{-- <meta name="twitter:creator" content="@author_handle"> --}}
        {{-- <-- Twitter Summary card images must be at least 120x120px --> --}}
        <meta name="twitter:image" content="{{$image}}">

        {{-- <meta property="fb:admins" content="Facebook numeric ID" /> --}}
    @endpush
