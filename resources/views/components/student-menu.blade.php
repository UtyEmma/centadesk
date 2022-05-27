 <style>
     .scroll-menu{
        width: 100%;
     }

     @media only screen and (max-width: 1023px){
         .scroll-menu{
            overflow-x: scroll;
            width: 100%;
            display: flex;
            flex-wrap: nowrap;
            white-space: nowrap;
         }
     }
 </style>

    <!-- All Courses Tabs Menu Start -->
<ul class="nav scroll-menu px-0 mx-0 mt-1">
    <li class="nav-item me-2">
        <a class="nav-link pe-2 ps-0 {{ (request()->is('learning')) ? 'text-primary fw-bold' : '' }}" aria-current="page" href="/learning">Overview</a>
    </li>
    <li class="nav-item me-2">
        <a class="nav-link pe-2 ps-0 {{ (request()->is('learning/courses')) ? 'text-primary fw-bold' : '' }}" aria-current="page" href="/learning/courses">My Courses</a>
    </li>
    {{-- <li class="nav-item me-2">
        <a class="nav-link px-2 {{ (request()->is('learning/mentors')) ? 'text-primary fw-bold' : '' }}" href="/learning/mentors">My Mentors</a>
    </li> --}}
    <li class="nav-item me-2">
        <a class="nav-link px-2 {{ (request()->is('profile')) ? 'text-primary fw-bold' : '' }}" href="/profile">My Profile</a>
    </li>
    <li class="nav-item me-2">
        <a class="nav-link px-2 {{ (request()->is('wallet')) ? 'text-primary fw-bold' : '' }}" href="/wallet">My Wallet</a>
    </li>
</ul>
