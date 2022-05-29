<x-admin.app-layout>
    <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4>Create FAQ</h4>

                    <div class="mt-4">
                        <form action="/faqs/create" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input name="title" id="title" placeholder="Title" class="form-control" type="text" />
                                <x-errors name="title" />
                            </div>
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select name="type" id="type" class="form-control form-select">
                                    <option value="mentor">Mentor</option>
                                    <option value="student">Student</option>
                                </select>
                                <x-errors name="type" />
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea name="content" id="content" placeholder="Content" class="form-control" rows="5"></textarea>
                                <x-errors name="content" />
                            </div>

                            <button class="btn btn-primary mt-3" type="submit">Upload FAQ</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Frequently Asked Questions</h4>

                    {{$faqs->links()}}
                </div>

                <div>
                  <table class="table table-bordered table-responsive-md w-100">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($faqs as $faq)
                            <tr>
                                <td>
                                    {{$faq->id}}
                                </td>
                                <td>
                                    {{$faq->title}}
                                </td>
                                <td>
                                    {{$faq->content}}
                                </td>
                                <td>
                                    {{$faq->type}}
                                </td>
                                <td>
                                    <div class="badge {{$faq->status ? 'badge-primary' : 'badge-warning'}}">{{$faq->status ? 'Enabled' : 'Disabled' }}</div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="/faq/{{$faq->unique_id}}/edit">Edit Info</a>
                                        <a class="dropdown-item" href="/faq/{{$faq->unique_id}}/status">Disable</a>
                                        <x-swal class="dropdown-item" href="/faq/{{$faq->unique_id}}/delete">Delete</x-swal>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <p>No Categories</p>
                        @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
    </div>
</x-admin.app-layout>
