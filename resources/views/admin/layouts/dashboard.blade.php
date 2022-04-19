<x-admin.main-layout>
    @php
        $admin = Auth::guard('admin')->user();
    @endphp

    <x-admin.navbar :admin="$admin" />

    <div class="container-fluid page-body-wrapper">
        <x-admin.sidebar />

        <div class="main-panel">
            <div class="content-wrapper">
                {{$slot}}
            </div>

            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                  <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © {{date('Y')}} <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
                  <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Built with <i class="mdi mdi-heart text-danger"></i></span>
                </div>
            </footer>
        </div>

    </div>
</x-admin.main-layout>
