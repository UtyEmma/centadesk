<x-admin.app-layout>
    <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4>Create Testimonials</h4>

                    <div class="mt-4">
                        <form action="/testimonials/create" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <input name="name" id="name" placeholder="Full Name" class="form-control" type="text" />
                                        <x-errors name="name" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <input name="image" id="image" placeholder="Full Name" class="form-control" type="file" />
                                        <x-errors name="image" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="occupation">Occupation</label>
                                        <input name="occupation" id="occupation" placeholder="Occupation" class="form-control" type="text" />
                                        <x-errors name="occupation" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <input name="location" id="location" placeholder="Location" class="form-control" type="text" />
                                        <x-errors name="location" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="feedback">Feadback</label>
                                        <textarea name="feedback" id="feedback" placeholder="Feedback" class="form-control" rows="5"></textarea>
                                        <x-errors name="feedback" />
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary mt-3" type="submit">Upload Testimonial</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Testimonials</h4>
                <div>
                  <table class="table table-bordered table-responsive-md w-100">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Feedback</th>
                        <th>Occupation</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Showing</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($testimonials as $testimonial)
                            <tr>
                                <td>
                                    {{$testimonial->id}}
                                </td>
                                <td>
                                    <img src="{{$user->avatar ?? asset('images/icon/avatar.png')}}" style="object-fit: cover" alt="image"/>
                                    {{$testimonial->name}}
                                </td>
                                <td>
                                    {{$testimonial->feedback}}
                                </td>
                                <td>
                                    {{$testimonial->occupation}}
                                </td>
                                <td>
                                    {{$testimonial->location}}
                                </td>
                                <td>
                                    <div class="badge {{$testimonial->status ? 'badge-primary' : 'badge-warning'}}">{{$testimonial->status ? 'Enabled' : 'Disabled' }}</div>
                                </td>
                                <td>
                                    {{$testimonial->showing}}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="/testimonials/{{$testimonial->unique_id}}/edit">Edit Info</a>
                                        <a class="dropdown-item" href="/testimonials/{{$testimonial->unique_id}}/status">Disable</a>
                                        <a class="dropdown-item" href="/testimonials/{{$testimonial->unique_id}}/delete">Delete</a>
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
