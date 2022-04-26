<!-- Sidebar Wrapper Start -->
<div  class="d-none d-md-block bg-primary h-100 position-fixed col-md-2 pe-0 d-none d-md-block">
    <ul class="mt-3 app-menu text-white mx-0">
        <li class="w-100 app-menu-item {{request()->is('me') ? 'bg-white text-primary radius-left' : ''}}">
            <a class="active d-flex align-items-center w-100 p-3" href="/me">
                <i class="icofont-ui-home fs-4 me-3"></i>
                <span>Overview</span>
            </a>
        </li>
        <li class="{{request()->is('me/courses*') ? 'bg-white text-primary radius-left' : ''}}">
            <a class="active d-flex align-items-center w-100 p-3" href="/me/courses">
                <i class="icofont-book-alt fs-4 me-3"></i>
                <span>Courses</span>
            </a>
        </li>
        <li class="{{request()->is('me/wallet*') ? 'bg-white text-primary radius-left' : ''}}">
            <a class="active d-flex align-items-center w-100 p-3" href="/me/wallet">
                <i class="icofont-wallet fs-4 me-3"></i>
                <span>Wallet</span>
            </a>
        </li>
        <li class="{{request()->is('me/account*') ? 'bg-white text-primary radius-left' : ''}}">
            <a class="active d-flex align-items-center w-100 p-3" href="/me/account">
                <i class="icofont-user-alt-3 fs-4 me-3"></i>
                <span>Account</span>
            </a>
        </li>
    </ul>
</div>
<!-- Sidebar Wrapper End -->
<!-- Sidebar Wrapper Start -->


<div class="row">
    <div id="app-sidebar" class="bg-primary animate__animated h-100 position-fixed w-75 pe-0 d-md-none" style="z-index: 999">
        <script>
            function closeMenu(){
                const element = $('#app-sidebar')
                element.addClass('animate__slideOutLeft')
                element.removeClass('animate__slideInLeft')
                element.hide()
            }
        </script>

        <div class="w-100 float-left">
            <button class="float-right" onclick="closeMenu()">X</button>
        </div>

        <ul class="mt-3 app-menu text-white mx-0">
            <li class="w-100 app-menu-item {{request()->is('me') ? 'bg-white text-primary' : ''}}">
                <a class="active d-flex align-items-center w-100 p-3" href="/me">
                    <i class="icofont-ui-home fs-4 me-3"></i>
                    <span>Overview</span>
                </a>
            </li>
            <li class="{{request()->is('me/courses*') ? 'bg-white text-primary' : ''}}">
                <a class="active d-flex align-items-center w-100 p-3" href="/me/courses">
                    <i class="icofont-book-alt fs-4 me-3"></i>
                    <span>Courses</span>
                </a>
            </li>
            <li class="{{request()->is('me/wallet*') ? 'bg-white text-primary' : ''}}">
                <a class="active d-flex align-items-center w-100 p-3" href="/me/wallet">
                    <i class="icofont-wallet fs-4 me-3"></i>
                    <span>Wallet</span>
                </a>
            </li>
            <li class="{{request()->is('me/profile*') ? 'bg-white text-primary' : ''}}">
                <a class="active d-flex align-items-center w-100 p-3" href="/me/profile">
                    <i class="icofont-user-alt-3 fs-4 me-3"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li class="{{request()->is('me/settings*') ? 'bg-white text-primary' : ''}}">
                <a class="active d-flex align-items-center w-100 p-3" href="/me/settings">
                    <i class="icofont-settings fs-4 me-3"></i>
                    <span>Settings</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- Sidebar Wrapper End -->
</div>

