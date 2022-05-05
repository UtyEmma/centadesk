<x-admin.app-layout>
    <div class="row">
        <div class="col-md-4 grid-margin ">
            <div class="card">
                <div class="card-body">
                    <form action="/currencies" method="get">
                        @csrf
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword" placeholder="Search Currencies" aria-label="search" aria-describedby="search">
                            <div class="input-group-append">
                                <button class="btn btm-sm border btn-light">
                                    <i class="mdi mdi-magnify"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="mb-5 mt-2">
                        <a href="/currencies"><small>Clear Search</small></a>
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

                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{$currency->symbol}}">
                                        Edit
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="{{$currency->symbol}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Update Currency</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="/currencies/update/{{$currency->unique_id}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputUsername1">Currency</label>
                                                            <div class="input-group mb-3">
                                                                <input type="text" class="form-control" value="{{$currency->name}}" name="name" placeholder="Currency Name" aria-label="Currency Name" aria-describedby="basic-addon2">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 form-group">
                                                                <label for="exampleInputUsername1">Symbol</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control" value="{{$currency->symbol}}" name="symbol" placeholder="Currency Name" aria-label="Currency Name" aria-describedby="basic-addon2">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                                <label for="exampleInputUsername1">Exchange Rate (Based on {{$base->symbol}})</label>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control" value="{{$currency->rate}}" name="rate" placeholder="Currency Name" aria-label="Currency Name" aria-describedby="basic-addon2">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="sumbit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            </form>
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
