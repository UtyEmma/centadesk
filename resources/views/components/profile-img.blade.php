<div style="width: {{$size ?? '50px'}}; height: {{$size ?? '50px'}};">
    @if ($user->avatar)
            <x-rounded-img :img="$user->avatar" :circle="false" />
    @else
        <div class="bg-transparent rounded-none rounded-circle border border-2 border-primary ratio ratio-1x1 p-1">
            <x-avatar-initials :firstname="$user->firstname" :lastname="$user->lastname" />
        </div>
    @endif
</div>
