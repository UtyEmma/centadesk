@push('styles')
    <style>
        .default-avatar {
            background-color: #47d501;
            font-weight: 500;
            color: #fff;
            font-size: 1.6rem;
        }

        .default-avatar,
        .member-overlap-item {
            height: 35px;
            width: 35px;
            display: inline-block;
        }

        .member-overlap-item {
            margin-right: -13px;
            border: 1px solid #fff;
        }
    </style>
@endpush


<div class="d-flex align-items-center">
    @if ($users->count() > 4)
        @forelse ($users->take(4)->all() as $user)
            <div title="Baby Yoda" class="rounded-circle default-avatar member-overlap-item shadow-sm" style="background: url({{$user->avatar ?? asset('images/avatars/avatar-1.png')}}) 0 0 no-repeat; background-size: 120%; background-position: center;">
            </div>
        @empty
        @endforelse
    @else
        <div title="Baby Yoda" class="rounded-circle default-avatar member-overlap-item shadow-sm" style="background: url({{asset('images/avatars/avatar-1.png')}}) 0 0 no-repeat; background-size: 120%; background-position: center;">
        </div>
        <div title="R2D2" class="rounded-circle default-avatar member-overlap-item shadow-sm" style="background: url({{asset('images/avatars/avatar-2.png')}}) 0 0 no-repeat; background-size: 120%; background-position: center;">
        </div>
        <div title="Jabba the Hut" class="rounded-circle default-avatar member-overlap-item shadow-sm" style="background: url({{asset('images/avatars/avatar-3.png')}}) 0 0 no-repeat; background-size: 120%; background-position: center;">
        </div>
        <div title="Chewbacca" class="rounded-circle default-avatar member-overlap-item shadow-sm" style="background: url({{asset('images/avatars/avatar-4.png')}}) 0 0 no-repeat; background-size: 120%; background-position: center;">
        </div>
    @endif

    @if ($users->count() > 0)
        <small class="ms-4">+ {{$users->count()}} {{Str::plural('student', $users->count())}}</small>
    @endif
  </div>
