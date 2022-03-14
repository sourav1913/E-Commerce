@extends('layouts.backendapp')
@section('title', "Producte Category")

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-5 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Category-Add </h2>
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
                            <form class="form-label-left input_mask" action="{{ route('backend.category.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="col-md-12  form-group">
                                    <label for="name">Category Name:</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Category Name">
                                </div>

                                <div class="col-md-12  form-group">
                                    <label for="parent">Parent Category:</label>
                                    <select name="parent" id="parent" class="form-control">
                                        <option disabled selected> Select Parent Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-md-12  form-group">
                                    <label for="description">Category Description:</label>
                                    <textarea name="description" id="description" class="form-control"  rows="4"></textarea>
                                </div>

                                <div class="col-md-12  form-group">
                                    <label for="image">Category Image:</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    <p>Image size 200x256 px</p>
                                </div>

                                <div class="col-md-12  form-group">
                                    <label for="icon">Category Menu Icon:</label>
                                    <input type="text" class="form-control" name="icon" id="icon">
                                    <p>Full Icon Class Name</p>
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
                          <h2>All Category</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                          <table class="table table-hover table-bordered">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Slug</th>
                                <th>Actione</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <td>{{ $category->name }}
                                    </td>
                                    <td>
                                        <img width="50" src="{{ asset('storage/category/'.$category->image) }}" alt="{{ $category->name }}">
                                    </td>
                                    <td>{{ $category->slug }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                  </tr>

                                  @if ($category->childs)
                                    @foreach ($category->childs as $child)
                                        <tr>
                                            <th scope="row"></th>
                                            <td>{{ "-- $child->name" }}
                                            </td>
                                            <td>
                                                <img width="50" src="{{ asset('storage/category/'.$child->image) }}" alt="{{ $child->name }}">
                                            </td>
                                            <td>{{ $child->slug }}</td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm">View</a>
                                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                  @endif
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
