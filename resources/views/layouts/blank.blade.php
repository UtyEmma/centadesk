<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @stack('meta')

        @stack('title')

        <link rel="icon" href="{{asset('images/icon.png')}}" />

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{asset('css/vendor/plugins.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/plugins/swiper-bundle.min.css')}}">

        <!-- Icon Font CSS -->
        <link rel="stylesheet" href="{{ asset('css/plugins/icofont.min.css')}} ">
        <link rel="stylesheet" href="{{ asset('css/plugins/flaticon.css')}} ">
        {{-- <link rel="stylesheet" href="{{ asset('css/plugins/font-awesome.min.css')}} "> --}}
        {{-- <link rel="stylesheet" href="{{ asset('css/plugins/jqvmap.min.css')}} "> --}}

        <link rel="stylesheet" href="{{asset('css/plugins/animate.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/plugins/swiper-bundle.min.css')}}">

        <link rel="stylesheet" href="{{ asset('css/plugins/bs-stepper.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/plugins/simple-notify.min.css')}}">

        <link rel="stylesheet" href="{{asset('css/plugins/sweetalert.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="{{ asset('css/custom.css')}} ">

        <link rel="stylesheet" href="{{ asset('css/plugins/bootstrap-select.css')}} ">


        <!-- Theme included stylesheets -->

        @stack('styles')

        <!-- JS ============================================ -->
        <!-- Modernizer & jQuery JS -->
        <script src="{{asset('js/vendor/modernizr-3.11.2.min.js')}}" ></script>
        <script src="{{asset('js/vendor/jquery-3.5.1.min.js')}}" ></script>


        <!-- Bootstrap JS -->
        {{-- <script src="{{asset('js/plugins/bootstrap.min.js')}}" ></script>
        <script src="{{asset('js/plugins/popper.min.js')}}" ></script> --}}


        <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
        <script src="{{asset('js/plugins.min.js')}}"></script>

        <script src="{{asset('js/plugins/bs-stepper.min.js')}}" ></script>

        <script src="{{asset('js/plugins/moment.min.js')}}" ></script>
        <script src="{{asset('js/plugins/jquery.inputmask.min.js')}}" ></script>

        <script src="{{asset('js/plugins/jquery.countdown.js')}}" ></script>
        <script src="{{asset('js/plugins/jquery-repeater.min.js')}}" ></script>

        <script src="{{asset('js/plugins/easepick.min.js')}}" defer></script>

        <script src="{{asset('js/plugins/validator.js')}}"></script>
        <script src="{{asset('js/validation.js')}}"></script>

        <script src="{{asset('js/plugins/bootstrap-select.js')}}"></script>
        <script src="{{ asset('js/plugins/sweetalert.js')}} "></script>

        <!-- Main JS -->
        <script src="{{asset('js/main.js')}}" ></script>
        <script src="{{asset('js/ajax.js')}}"></script>

        <script src="{{asset('js/plugins/simple-notify.min.js')}}"></script>

        <!-- Hotjar Tracking Code for https://libraclass.com -->
        <script>
            (function(h,o,t,j,a,r){
                h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                h._hjSettings={hjid:2955498,hjsv:6};
                a=o.getElementsByTagName('head')[0];
                r=o.createElement('script');r.async=1;
                r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                a.appendChild(r);
            })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
        </script>

        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/610d09e9d6e7610a49aee652/1g2986mgh';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
        <!--End of Tawk.to Script-->


        @stack('scripts')
    </head>
    <body>

        {{$slot}}

        <x-toasts />
    </body>
</html>
