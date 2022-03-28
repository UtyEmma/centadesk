<x-admin.main-layout>
    <x-admin.navbar></x-admin.navbar>

    <div class="container-fluid page-body-wrapper">
        <x-admin.sidebar />

        <div class="main-panel">
            <div class="content-wrapper">
                {{$slot}}
            </div>

            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                  <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
                  <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
                </div>
            </footer>
        </div>

    </div>
</x-admin.main-layout>
