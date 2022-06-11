<x-page-banner>
    <div class="m-0 page-banner-content p-0 d-flex justify-content-between align-items-end">
        <div>
            <h2 class="title pb-0 mt-0">Learning Center</h2>
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Learning Center</li>
            </ul>
        </div>

        @if(Auth::user() && Auth::user()->role !== 'mentor')
            <div>
                <a href="/mentor/join" class="d-none d-md-block btn btn-primary btn-hover-dark btn-custom">Become a Mentor</a>
            </div>
        @endif
    </div>

    <x-student-menu />
</x-page-banner>
