<!-- Login Header Start -->
    <div class="section login-header position-sticky top-0">
        @php
            $user = Auth::user();
        @endphp
        <!-- Login Header Wrapper Start -->
        <div class="login-header-wrapper navbar navbar-expand">

            <!-- Header Logo Start -->
            <div class="login-header-logo">
                <a href="/"><img src="{{asset('images/logo-icon.png')}}" alt="Logo"></a></li>
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
                    <button onclick="toggleMenuShow()" class="menu-toggle text-white" href="javascript:void(0)">
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
                <div class="dropdown">
                    <button class="action notification" data-bs-toggle="dropdown">
                        <i class="flaticon-notification"></i>
                        <span class="active"></span>
                    </button>
                    <div class="dropdown-menu dropdown-notification">
                        <ul class="notification-items-list">
                            <li class="notification-item">
                                <span class="notify-icon bg-success text-white"><i class="icofont-ui-user"></i></span>
                                <div class="dropdown-body">
                                    <a href="#">
                                        <p><strong>Martin</strong> has added a <strong>customer</strong> Successfully
                                        </p>
                                    </a>
                                </div>
                                <span class="notify-time">3:20 am</span>
                            </li>
                            <li class="notification-item">
                                <span class="notify-icon bg-success text-white"><i class="icofont-shopping-cart"></i></span>
                                <div class="dropdown-body">
                                    <a href="#">
                                        <p><strong>Jennifer</strong> purchased Light Dashboard 2.0.</p>
                                    </a>
                                </div>
                                <span class="notify-time">3:20 am</span>
                            </li>
                            <li class="notification-item">
                                <span class="notify-icon bg-danger text-white"><i class="icofont-book-mark"></i></span>
                                <div class="dropdown-body">
                                    <a href="#">
                                        <p><strong>Robin</strong> marked a <strong>ticket</strong> as unsolved.
                                        </p>
                                    </a>
                                </div>
                                <span class="notify-time">3:20 am</span>
                            </li>
                            <li class="notification-item">
                                <span class="notify-icon bg-success text-white"><i class="icofont-heart-alt"></i></span>
                                <div class="dropdown-body">
                                    <a href="#">
                                        <p><strong>David</strong> purchased Light Dashboard 1.0.</p>
                                    </a>
                                </div>
                                <span class="notify-time">3:20 am</span>
                            </li>
                            <li class="notification-item">
                                <span class="notify-icon bg-success text-white"><i class="icofont-image"></i></span>
                                <div class="dropdown-body">
                                    <a href="#">
                                        <p><strong> James.</strong> has added a<strong>customer</strong> Successfully
                                        </p>
                                    </a>
                                </div>
                                <span class="notify-time">3:20 am</span>
                            </li>
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
