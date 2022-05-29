<x-admin.app-layout>
    <div class="grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Reports</h4>

                {{-- <form action="/withdrawals/update" method="post"> --}}
                    {{-- @csrf --}}
                    {{-- <div class="float-right">
                        <a href="" class="btn btn-outline-success">Confirm Selected</a>
                        <a href="" class="btn btn-outline-warning">Decline Selected</a>
                    </div> --}}

                    <table class="table table-bordered mt-3 table-responsive-md">
                        <thead>
                            {{-- <script>
                                function checkAll(e){
                                    const name = e.target.name
                                    $(`input[name='reports[]']`).prop('checked', e.target.checked)
                                    console.log($(`input[name='reports[]']`))
                                }
                            </script> --}}
                            <tr>
                                {{-- <th>
                                    <input  name="reports[]" type="checkbox" onchange="checkAll(event)">
                                </th> --}}
                                <th>Student</th>
                                <th>Message</th>
                                <th>Course Name</th>
                                <th>Batch Name</th>
                                <th>Mentor</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reports as $report)
                                <tr>
                                    {{-- <td>
                                        <input type="checkbox" name="reports[]" value="{{$report->unique_id}}" >
                                    </td> --}}
                                    <td>
                                        <a href="/users/{{$report->user->unique_id}}">
                                            {{$report->user->firstname}} {{$report->user->lastname}}
                                        </a>
                                        <br>
                                        <small>Email Address</small>
                                        <a href="mailto:{{$report->user->email}}">
                                            {{$report->user->email}}
                                        </a>
                                    </td>
                                    <td>
                                        {{$report->message}}
                                    </td>
                                    <td>
                                        <a href="/courses/{{$report->course->slug}}">
                                            {{$report->course->name}}
                                        </a>
                                        <br>
                                    </td>
                                    <td>
                                        <a href="">
                                            {{$report->batch->title}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="/users/{{$report->mentor->unique_id}}">
                                            {{$report->mentor->firstname}} {{$report->mentor->lastname}}
                                        </a>
                                        <br>
                                        <small>Email Address</small>
                                        <a href="mailto:{{$report->mentor->email}}">
                                            {{$report->mentor->email}}
                                        </a>
                                    </td>
                                    <td>
                                        <div class="badge {{$report->status ? 'badge-primary' : 'badge-warning'}}">{{$report->status}}</div>
                                    </td>
                                    <td>
                                        @if ($report->status === 'pending')
                                            <div class="btn-group">
                                                <x-swal href="/reports/{{$report->unique_id}}/resolve" class="btn btn-outline-secondary">
                                                    Mark As Resolved
                                                </x-swal>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <p>No Categories</p>
                            @endforelse
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</x-admin.app-layout>
