<x-page-banner>
    @php
        $user = Auth::user();
    @endphp

    <div class="col-md-6 d-flex align-items-end">
        <div class="m-0 page-banner-content">
            <h2 class="title pb-0">Learning Center</h2>
            <ul class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Learning Center</li>
            </ul>
        </div>
    </div>

    <x-student-menu />
</x-page-banner>
    <!-- Page Banner End -->
