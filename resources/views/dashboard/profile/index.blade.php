<x-app-layout>
    <div class="page-content-wrapper">
        <div class="container-fluid px-3 px-md-5">
            <div class="mb-3">
                <h4 class="my-0">Account Details</h4>
                <p class="my-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laudantium, aliquam.</p>
            </div>

            <x-mentor.kyc-warning />

            <!-- Account page navigation-->
            <nav class="nav nav-borders bg-light p-2 radius mb-4">
                <a class="nav-link active ms-0" href="/me/account">Profile</a>
                <a class="nav-link" href="/me/account/payments" >Payments</a>
                <a class="nav-link" href="/me/account/settings" >Settings</a>
            </nav>

            <div class="row">
                {{$slot}}
            </div>
        </div>
    </div>
</x-app-layout>
