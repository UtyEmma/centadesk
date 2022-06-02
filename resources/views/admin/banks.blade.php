<x-admin.app-layout>
    <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4>Available Banks</h4>
                    <p>List of Banks available on Flutterwave</p>
                    <div class="mt-4">
                        <a href="/banks/refresh" class="btn btn-primary">Refresh Bank List</a>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Banks</h4>
                    <p class="card-description">
                        {{$banks->links()}}
                    </p>
                    <div>
                    <table class="table table-bordered table-md-responsive w-100">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Code</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($banks as $bank)
                                <tr>
                                    <td>
                                        {{$bank->id}}
                                    </td>
                                    <td>
                                        {{$bank->name}}
                                    </td>
                                    <td>
                                        {{$bank->code}}
                                    </td>
                                </tr>
                            @empty
                                <p>No Categories</p>
                            @endforelse
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-description">
                        {{$banks->links()}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-admin.app-layout>
