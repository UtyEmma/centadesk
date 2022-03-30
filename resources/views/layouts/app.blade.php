<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Centadesk') }}</title>

        <link rel="icon" href="{{asset('images/icon.png')}}" />

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{asset('css/vendor/plugins.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/plugins/swiper-bundle.min.css')}}">

        <!-- Icon Font CSS -->
        <link rel="stylesheet" href="{{ asset('css/plugins/icofont.min.css')}} ">
        <link rel="stylesheet" href="{{ asset('css/plugins/flaticon.css')}} ">
        <link rel="stylesheet" href="{{ asset('css/plugins/font-awesome.min.css')}} ">
        <link rel="stylesheet" href="{{ asset('css/plugins/tagify.min.css')}} ">
        <link rel="stylesheet" href="{{ asset('css/plugins/date-range-picker.css')}} ">
        <link rel="stylesheet" href="{{ asset('css/plugins/jqvmap.min.css')}} ">
        <link rel="stylesheet" href="{{ asset('vendor/summernote-0.8.18-dist/summernote-lite.min.css')}} ">

        <link rel="stylesheet" href="{{asset('css/plugins/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/plugins/swiper-bundle.min.css')}}">

        <link rel="stylesheet" href="{{ asset('css/plugins/bs-stepper.min.css')}} ">

        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css"/>
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('css/custom.css')}} ">

        @stack('styles')

        <!-- JS ============================================ -->
        <!-- Modernizer & jQuery JS -->
        <script src="{{asset('js/vendor/modernizr-3.11.2.min.js')}}" ></script>
        <script src="{{asset('js/vendor/jquery-3.5.1.min.js')}}" ></script>


        <!-- Bootstrap JS -->
        <script src="{{asset('js/plugins/bootstrap.min.js')}}" ></script>
        <script src="{{asset('js/plugins/popper.min.js')}}" ></script>

        <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
        <script src="{{asset('js/plugins.min.js')}}"></script>

        <script src="{{asset('js/plugins/bs-stepper.min.js')}}" ></script>
        <script src="{{asset('js/plugins/tagify/tagify.min.js')}}"></script>
        <script src="{{asset('js/plugins/tagify/tagify.polyfills.min.js')}}" ></script>
        <script src="{{asset('js/plugins/moment.min.js')}}" ></script>
        <script src="{{asset('js/plugins/date-range-picker.min.js')}}" ></script>
        <script src="{{asset('vendor/summernote-0.8.18-dist/summernote-lite.min.js')}}" ></script>

        <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>


        <!-- Main JS -->
        <script src="{{asset('js/main.js')}}" ></script>
        <script src="{{asset('js/ajax.js')}}"></script>

        @stack('scripts')
    </head>
    <body>

        <div class="main-wrapper">
            @include('layouts.dashboard.app-header')

            <div class="section overflow-hidden position-relative row px-0 mx-0" id="wrapper">
                @include('layouts.dashboard.app-sidebar')

                <div class="col-md-10 offset-md-2 px-0">
                    {{$slot}}
                </div>
            </div>
        </div>
    </body>
</html>
