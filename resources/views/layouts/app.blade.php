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

        <!-- Main Style CSS -->
        <link rel="stylesheet" href="{{asset('css/vendor/plugins.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">

        <!-- JS
        ============================================ -->

    </head>
    <body>

        <div class="main-wrapper main-wrapper-02">
            @include('layouts.dashboard.app-header')

            <div class="section overflow-hidden position-relative" id="wrapper">
                @include('layouts.dashboard.app-sidebar')

                <div class="page-content-wrapper py-0">
                    {{$slot}}
                </div>
            </div>
        </div>

        <!-- Modernizer & jQuery JS -->
        <script src="{{asset('js/vendor/modernizr-3.11.2.min.js')}}" defer></script>
        <script src="{{asset('js/vendor/jquery-3.5.1.min.js')}}" defer></script>

        <!-- Bootstrap JS -->
        <script src="{{asset('js/plugins/popper.min.js')}}" defer></script>
        <script src="{{asset('js/plugins/bootstrap.min.js')}}" defer></script>

        <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
        <script src="{{asset('js/plugins.min.js')}}" defer></script>

        <!-- Main JS -->
        <script src="{{asset('js/main.js')}}" defer></script>
    </body>
</html>
