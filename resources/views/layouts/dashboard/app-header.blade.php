<!-- Login Header Start -->
    <div class="section login-header position-sticky top-0">
        @php
            $user = Auth::user();
        @endphp
        <!-- Login Header Wrapper Start -->
        <div class="login-header-wrapper navbar navbar-expand">

            <!-- Header Logo Start -->
            <div class="login-header-logo">
                <a href="/"><img src="{{asset('images/libra-gr-wh.png')}}" width="150" alt="Logo"></a></li>
            </div>
            <!-- Header Logo End -->

            <div class="header-toggle d-lg-none ml-5">
                <script>

                    $(document).ready(() => {
                        const element = $('#app-sidebar')
                        element.hide()
                    })

                    function toggleMenuShow(){
                        const element = $('#app-sidebar')
                        element.removeClass('animate__slideOutLeft')
                        element.addClass('animate__slideInLeft')
                        element.show()
                    }
                </script>

                <div>
                    <button onclick="toggleMenuShow()" class="menu-toggle text-white ms-2" href="javascript:void(0)">
                        <span class="bg-white"></span>
                        <span class="bg-white"></span>
                        <span class="bg-white"></span>
                    </button>
                </div>
            </div>

            <!-- Header Search Start -->
            <div class="login-header-search dropdown">
                <button class="search-toggle" data-bs-toggle="dropdown"><i class="flaticon-loupe"></i></button>

                <div class="search-input dropdown-menu">
                    <form action="#">
                        <input type="text" placeholder="Search here">
                    </form>
                </div>

            </div>
            <!-- Header Search End -->

            <!-- Header Action Start -->
            <div class="login-header-action ml-auto">
                <div class="dropdown dropleft">
                    <button class="action notification" data-bs-toggle="dropdown">
                        <i class="flaticon-notification"></i>
                        <span class="active"></span>
                    </button>
                    <div class="dropdown-menu dropdown-notification right-0" style="right: 0;">
                        <ul class="notification-items-list">
                            @foreach ($user->notifications as $key => $notification)
                                <li class="notification-item">
                                    <div class="row">
                                        <div class="col-2">
                                            <span class="notify-icon bg-success text-white"><i class="icofont-ui-user"></i></span>
                                        </div>

                                        <div class="col-10">
                                            <div class="dropdown-body">
                                                <a href="{{$notification->data['link'] ?? ''}}">
                                                    {{$notification->data['title']}}
                                                </a>
                                            </div>
                                            <small class="mt-0" style="font-size: 12px;">{{Date::parse($notification->created_at)->diffForHumans()}}</small>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <a class="all-notification" href="#">See all notifications <i class="icofont-simple-right"></i></a>
                    </div>
                </div>

                <a class="action rounded-img" href="/me/account" style="">
                    <img src="{{$user->avatar ?? asset('images/author/author-07.jpg')}}" alt="Author">
                </a>
            </div>
            <!-- Header Action End -->

        </div>
        <!-- Login Header Wrapper End -->
    </div>
    <!-- Login Header End -->
