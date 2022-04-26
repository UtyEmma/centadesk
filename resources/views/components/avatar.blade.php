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

<div class="position-relative avatar-toggle">
    <button onclick="toggleAvatarMenu()" class="bg-transparent border-0 p-0" >
        @if ($user->avatar)
            <x-rounded-img :img="$user->avatar" :circle="false" />
        @else
            <div class="bg-transparent rounded-none rounded-circle border border-2 border-primary ratio ratio-1x1 p-1">
                <x-avatar-initials :firstname="$user->firstname" :lastname="$user->lastname" />
            </div>
        @endif
    </button>

    <ul class="position-absolute animate__fadeInTopRight flex-column avatar-menu bg-white border radius mt-1 shadow-sm" style="width: auto; display: block; right: 0;">
        <li class="w-100" ><a class="dropdown-item py-2" href="#">My Profile</a></li>
        <li class="w-100"><a class="dropdown-item py-2" href="#">My Learning</a></li>
        @if ($user->role === 'mentor')
        <li class="w-100"><a class="dropdown-item py-2" href="/me">Mentor Dashboard</a></li>
        @else
        <li class="w-100"><a class="dropdown-item py-2" href="/mentor/onboarding">Become a Mentor</a></li>
        @endif
        <li class="w-100"><a class="dropdown-item py-2" href="/logout">Logout</a></li>
    </ul>
</div>
