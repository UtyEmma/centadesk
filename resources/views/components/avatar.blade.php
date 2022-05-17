<script>
    $(document).ready(function(){
        $('.avatar-menu').hide()
    })

    function toggleAvatarMenu(){
        $('.avatar-menu').toggle()
    }

    $(window).click(function(event){
        const element = $('.avatar-toggle');
        if(element.is(':visible')){
            if(!element.has(event.target).length) $('.avatar-menu').hide()
        }
    })
</script>

@push('styles')
    <style>
        .avatar-toggle button{
            width: 50px;
            height: 50px;
            padding: 3px;
        }

        @media only screen and (max-width: 1023px) {
            .avatar-toggle button{
                width: 45px;
                height: 45px;
                padding: 2px;
            }
        }
    </style>
@endpush

<div class="position-relative avatar-toggle">
    <button onclick="toggleAvatarMenu()" class="bg-transparent border-0 p-0" >
        <x-rounded-img :img="$user->avatar" :circle="false" />
    </button>

    <ul class="position-absolute animate__fadeInTopRight flex-column avatar-menu bg-white border radius mt-1 shadow-sm" style="width: auto; display: block; right: 0;">
        <li class="w-100" ><a class="dropdown-item py-2 fw-normal fs-6" href="/profile">My Profile</a></li>
        <li class="w-100"><a class="dropdown-item py-2 fw-normal fs-6" href="/learning">My Learning</a></li>
        @if ($user->role === 'mentor')
        <li class="w-100"><a class="dropdown-item py-2 fw-normal fs-6" href="/me">Mentor Dashboard</a></li>
        @else
        <li class="w-100"><a class="dropdown-item py-2 fw-normal fs-6" href="/mentor/join">Become a Mentor</a></li>
        @endif
        <li class="w-100"><a class="dropdown-item py-2 fw-normal fs-6" href="/logout">Logout</a></li>
    </ul>
</div>
