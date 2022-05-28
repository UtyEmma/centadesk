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
            height: 40px;
            width: 40px;
            display: inline-block;
        }

        .member-overlap-item {
            margin-right: -13px;
            border: 1px solid #fff;
        }
    </style>
@endpush


<div class="d-block">
    @if (count($users) > 0)
        @forelse ($users as $user)

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
        <div title="C-3PO" class="rounded-circle default-avatar member-overlap-item" style="background: url({{asset('images/avatars/avatar-5.png')}}) 0 0 no-repeat; background-size: 120%; background-position: center;">
        </div>
    @endif
  </div>
