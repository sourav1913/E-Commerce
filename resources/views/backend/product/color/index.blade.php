@extends('layouts.backendapp')
@section('title',"Producte Size")

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-5 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Color Add</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br>
                            <form class="form-label-left input_mask" action="{{ route('backend.color.store') }}" method="POST">
                                @csrf

                                <div class="col-md-12  form-group">
                                    <label for="name">Color:</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Color Name">
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-9 col-sm-9  offset-md-3">
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="x_panel">
                        <div class="x_title">
                          <h2>All Color</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Actione</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($colors as $color)
                                <tr>
                                    <th scope="row">{{ $color->id }}</th>
                                    <td>{{ $color->name }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm">View</a>
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
    </section>

    @if (session('success'))
    <div class="toast" style="position: absolute; top: 0; right: 0;" data-delay="10000">
        <div class="toast-header">
            <strong class="mr-auto">{{ config('app.name') }}</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            {{ session('success') }}
        </div>
    </div>
    @endif
@endsection

@section('backend__js')
    <script>
        $('.toast').toast('show');
    </script>
@endsection
