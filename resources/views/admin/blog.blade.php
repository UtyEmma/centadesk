<x-admin.app-layout>
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
              <div class="d-flex justify-content-between">
                  <div>
                      <h4 class="card-title">Blog Posts</h4>
                      <p>Posts are Fetched from Medium</p>
                  </div>

                  <div>
                      <a href="/blog/fetch" class="btn btn-primary">Update Posts From Medium</a>
                  </div>
              </div>

            <div class="w-100">
              <table class="table table-bordered table-responsive-md">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Medium Link</th>
                    <th>Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>
                                <a href="{{env('MAIN_APP_URL')}}/blog/{{$post->slug}}" class="ml-2">{{$post->title}}</a>
                            </td>
                            <td>
                                {{$post->author}}
                            </td>
                            <td>
                                <a href="{{$post->medium_link}}">Medium Link</a>
                            </td>
                            <td>
                                <span class="badge {{$post->status === 'published' ? 'badge-success' : 'badge-warning' }}">{{$post->status ? 'active' : 'inactive'}}</span>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="/blog/{{$post->unique_id}}">View Details</a>
                                    <a class="dropdown-item" href="/blog/{{$post->unique_id}}/edit">Edit Info</a>
                                    <hr/>
                                    <a class="dropdown-item" href="/blog/{{$post->unique_id}}/status">Disable</a>
                                    <x-swal class="dropdown-item" href="/blog/{{$post->unique_id}}/delete">Delete</x-swal>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
</x-admin.app-layout>
