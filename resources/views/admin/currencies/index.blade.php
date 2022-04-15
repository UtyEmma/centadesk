<x-admin.app-layout>
    <div class="row">
        <div class="col-md-4 grid-margin ">
            <div class="card">
                <div class="card-body">

                    <div class="input-group mb-5">
                        <input type="text" class="form-control" placeholder="Search Currencies" aria-label="search" aria-describedby="search">
                        <div class="input-group-append">
                            <span class="input-group-text" id="search">
                            <i class="mdi mdi-magnify"></i>
                            </span>
                        </div>
                    </div>

                    <h4>Base Currency</h4>
                    <p style="font-size: 18px;">{{$base->name ?? ""}} <span class="font-weight-bold">({{$base->symbol}})</span></p>


                    <div  class="mt-4">
                        @if (count($currencies) < 1)
                            <a class="btn btn-primary" href="/currencies/set">Set Currencies</a>
                        @endif
                        <a class="btn btn-primary" href="/currencies/update-rates">Update Rates</a>
                        <a class="btn btn-primary" href="/countries">Fetch Countries</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Currencies</h4>
                <p class="card-description">
                  {{-- Add class <code>.table-striped</code> --}}
                </p>
                <div>
                  <table class="table table-bordered table-responsive">
                    <thead >
                      <tr >
                        <th></th>
                        <th>Name</th>
                        <th>Symbol</th>
                        <th>Rate</th>
                        <th>Status</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($currencies as $currency)
                            <tr>
                                <td>
                                    {{$currency->id}}
                                </td>
                                <td>
                                    {{$currency->name}}
                                </td>
                                <td>
                                    {{$currency->symbol}}
                                </td>
                                <td>
                                    {{$currency->rate}}
                                </td>
                                <td>
                                    @if ($currency->base)
                                        <span class="badge badge-success">Base</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="/currency/{{$currency->unique_id}}">View Details</a>
                                        <a class="dropdown-item" href="/currency/{{$currency->unique_id}}/edit">Edit Info</a>
                                        <hr/>
                                        <a class="dropdown-item" href="/currency/{{$currency->unique_id}}/status">Disable</a>
                                        <a class="dropdown-item" href="/currency/{{$currency->unique_id}}/delete">Delete</a>
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
    </div>
</x-admin.app-layout>
