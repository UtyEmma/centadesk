@if ($user->avatar)
    <x-rounded-img :img="$user->avatar" />
@else
    <div style="padding: 2px;" class="bg-transparent rounded-none ratio ratio-1x1 rounded-circle border border-2 border-primary">
        <x-avatar-initials :firstname="$user->firstname" :lastname="$user->lastname" />
    </div>
@endif
