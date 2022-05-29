<x-admin.app-layout>
    <div class=" grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Category Suggestions</h4>
            <p class="card-description">
                {{-- Add class <code>.table-striped</code> --}}
            </p>
            <div>
                <table class="table table-bordered  table-responsive-md">
                <thead>
                    <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>User</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($suggestions as $suggestion)
                        <tr>
                            <td>
                                {{$suggestion->title}}
                            </td>
                            <td>
                                {{$suggestion->description}}
                            </td>
                            <td>
                                {{$suggestion->user}}
                            </td>
                            <td>
                                <x-swal class="btn btn-success" href="/categories/suggestions/{{$suggestion->unique_id}}/update?action=accept">Accept</x-swal>
                                <x-swal class="btn btn-danger" href="/categories/suggestions/{{$suggestion->unique_id}}/update?action=decline">Decline</x-swal>
                            </td>
                        </tr>
                    @empty
                        <p>No Category Suggestions</p>
                    @endforelse
                </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</x-admin.app-layout>
