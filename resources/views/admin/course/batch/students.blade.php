<x-admin.course-detail-layout :course="$course">
    </x-admin.batch.index :course="$course" :batch="$batch">
        <div>
            <table class="table table-bordered table-responsive-md">
                <thead>
                    <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Enrollment Date</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $user)
                        <tr>
                            <td>
                                <a href="/users/{{$user->unique_id}}" class="ml-2">{{$user->firstname}} {{$user->lastname}}</a>
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="text-capitalize lh-1">
                                        {{$user->role}}
                                    </span>
                                    @if ($user->role === 'mentor' && $user->kyc_status === 'pending')
                                        <span class="badge badge-warning">{{$user->kyc_status}} approval</span>
                                    @endif
                                </div>
                            </td>
                            <td>
                                {{$user->enrolled_at}}
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="/users/{{$user->unique_id}}">View Details</a>
                                    <a class="dropdown-item" href="/users/{{$user->unique_id}}/edit">Edit Info</a>
                                    <hr/>
                                    <a class="dropdown-item" href="/users/{{$user->unique_id}}/status">Disable</a>
                                    <x-swal class="dropdown-item" href="/users/{{$user->unique_id}}/delete">Delete</x-swal>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-admin.batch.index>
</x-admin.course-detail-layout>
