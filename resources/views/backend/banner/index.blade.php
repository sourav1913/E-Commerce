@extends('layouts.backendapp')

@section('title', 'All Banners | ')

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12  ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Table design <small>Custom design</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                        aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Settings 1</a>
                                        <a class="dropdown-item" href="#">Settings 2</a>
                                    </div>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">

                            <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>

                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                        <tr class="headings">
                                            <th class="column-title">Id </th>
                                            <th class="column-title">image </th>
                                            <th class="column-title">Title </th>
                                            <th class="column-title">description </th>
                                            <th class="column-title">status </th>
                                            <th class="column-title">action </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($datas as $data)
                                        <tr class="even pointer">
                                            <td >{{ $data->id }}</td>
                                            <td >
                                                <img width="100" src="{{ asset('storage/banner/'.$data->photo) }}" alt="">
                                            </td>
                                            <td >{{ $data->title }}</td>
                                            <td >{{ Str::limit($data->description, 25, '...') }}</td>
                                            <td><a href="#" class="btn btn-{{ $data->status == 1 ? "success" : "warning" }} btn-sm">{{ $data->status == 1 ? "Active" : "Deactive" }}</a></td>
                                            <td class=" last">
                                                <a href="{{ route('backend.banner.status', $data->id) }}" class="btn btn-{{ $data->status == 1 ? "warning" : "success" }} btn-sm">
                                                    {{ $data->status == 1 ? "Deactive" : "Active" }}
                                                </a>
                                                <a href="{{ route('backend.banner.edit',$data->id) }}" class="btn btn-primary btn-sm">View/Edit</a>

                                                <form class="d-inline"  action="{{ route('backend.banner.destroy',$data->id) }}" method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit"  class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty

                                        @endforelse
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 mt-5 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Deleted Data</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                        <tr class="headings">
                                            <th class="column-title">Id </th>
                                            <th class="column-title">image </th>
                                            <th class="column-title">Title </th>
                                            <th class="column-title">description </th>
                                            <th class="column-title">status </th>
                                            <th class="column-title">action </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($DataTrashed as $data)
                                        <tr class="even pointer">
                                            <td >{{ $data->id }}</td>
                                            <td >
                                                <img width="100" src="{{ asset('storage/banner/'.$data->photo) }}" alt="">
                                            </td>
                                            <td >{{ $data->title }}</td>
                                            <td >{{ Str::limit($data->description, 25, '...') }}</td>
                                            <td><a href="#"class="btn btn-{{ $data->status == 1 ? "warning" : "success" }} btn-sm">{{ $data->status == 1 ? "Active" : "Deactive" }}</a></td>
                                            <td class=" last">
                                                <a href="{{ route('backend.banner.restore',$data->id) }}" class="btn btn-primary btn-sm">Restore</a>

                                                <button value="{{ route('backend.banner.harddelete',$data->id) }}" id="delete"  class="btn btn-danger btn-sm">Hard Delete</button>

                                            </td>
                                        </tr>
                                        @empty

                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

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

@section('backend__css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.min.css">
@endsection

@section('backend__js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.4/sweetalert2.all.min.js"></script>
    <script>
        $('.toast').toast('show');
        //alert
        let url = $('#delete').val();
        $('#delete').on('click', function(){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            })
        })

    </script>
@endsection
