<x-admin.app-layout>
    <div class="row">
        <div class="col-md-3">
            <div class="p-4 bg-white">
                <h4>Base Currency</h4>
                <p>{{$base->name ?? ""}}</p>

            </div>

            <div  class="mt-4">
                @if (count($currencies) < 1)
                    <a class="btn btn-primary" href="/currencies/set">Set Currencies</a>
                @endif
                <a class="btn btn-primary" href="/currencies/update-rates">Update Exchange Rates</a>
                <a class="btn btn-primary" href="/countries">Fetch Countries</a>
            </div>
        </div>
        <div class="col-lg-9 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Currencies</h4>
                <p class="card-description">
                  {{-- Add class <code>.table-striped</code> --}}
                </p>
                <div>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
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
