@push('styles')
    <style>
        a.fb {
            background: #3A5A97;
            color: #fff;
            text-shadow: 0 -1px 0 rgba(0,0,20,.4);
            text-decoration: none;
        }
    </style>
@endpush

<a href="{{route('facebook.login')}}" class="btn fb w-100 d-flex align-items-center justify-content-center">
    <i class="icofont-facebook me-2 fs-4"></i>
    {{$slot}}
</a>
