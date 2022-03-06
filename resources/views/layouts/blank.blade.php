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


        <!-- Icon Font CSS -->
        <link rel="stylesheet" href="{{ asset('css/plugins/icofont.min.css')}} ">
        <link rel="stylesheet" href="{{ asset('css/plugins/flaticon.css')}} ">
        <link rel="stylesheet" href="{{ asset('css/plugins/font-awesome.min.css')}} ">
        <link rel="stylesheet" href="{{ asset('css/plugins/tagify.min.css')}} ">

        <!-- Main Style CSS -->
        <link rel="stylesheet" href="{{asset('css/vendor/plugins.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/plugins/bs-stepper.min.css')}} ">
        <link rel="stylesheet" href="{{asset('css/style.min.css')}}">
        <link rel="stylesheet" href="{{ asset('css/custom.css')}} ">

        <!-- JS
        ============================================ -->

    </head>
    <body>

        {{$slot}}

        <!-- Modernizer & jQuery JS -->
        <script src="{{asset('js/vendor/modernizr-3.11.2.min.js')}}" defer></script>
        <script src="{{asset('js/vendor/jquery-3.5.1.min.js')}}" defer></script>

        <!-- Bootstrap JS -->
        <script src="{{asset('js/plugins/popper.min.js')}}" defer></script>
        <script src="{{asset('js/plugins/bootstrap.min.js')}}" defer></script>
        <script src="{{asset('js/plugins/bs-stepper.min.js')}}" defer></script>
        <script src="{{asset('js/plugins/tagify/tagify.min.js')}}" defer></script>
        <script src="{{asset('js/plugins/tagify/tagify.polyfills.min.js')}}" defer></script>

        <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
        <script src="{{asset('js/plugins.min.js')}}" defer></script>

        <!-- Main JS -->
        <script src="{{asset('js/main.js')}}" defer></script>
    </body>
</html>
