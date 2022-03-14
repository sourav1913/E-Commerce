@extends('layouts.backendapp')
@section('title', "Add Producte |")
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Add Product</h2>
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
                            <form class="form-label-left input_mask" action="{{ route('backend.product.store') }}" method="POST" enctype="multipart/form-data">

                                @csrf

                                <div class="col-md-6  form-group">
                                    <label for="name">Product Name:</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Product Name" value="{{ old('name') }}">
                                </div>

                                <div class="col-md-6 form-group">
                                    <label>Photo</label>
                                    <input type="file" class="form-control" name="photo">
                                </div>

                                <div class="col-md-6  form-group">
                                    <label>Product Price:</label>
                                    <input type="text" class="form-control" name="price"  placeholder="Product Price" value="{{ old('price') }}">
                                </div>

                                <div class="col-md-6  form-group">
                                    <label>Sale Price:</label>
                                    <input type="text" class="form-control" name="sale_price"  placeholder="Product Price" value="{{ old('price') }}">
                                </div>

                                <div class="col-md-6  form-group">
                                    <label>Quantity:</label>
                                    <input type="text" class="form-control" name="quantity"  placeholder="Product Quantity" value="{{ old('quantity') }}">
                                </div>

                                <div class="col-md-6  form-group">
                                    <label>Category:</label>
                                    <select class="select-multiple form-control" name="categories[]" multiple="multiple">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                      </select>
                                </div>

                                <div class="col-md-6  form-group">
                                    <label>Size:</label>
                                    <select class="select-multiple form-control" name="sizes[]" multiple="multiple">
                                        @foreach ($sizes as $size)
                                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                                        @endforeach
                                      </select>
                                </div>

                                <div class="col-md-6  form-group">
                                    <label>Color:</label>
                                    <select class="select-multiple form-control" name="colors[]" multiple="multiple">
                                        @foreach ($colors as $color)
                                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                                        @endforeach
                                      </select>
                                </div>

                                <div class="col-md-12  form-group">
                                    <label>Short Description:</label>
                                    <textarea name="short_description" class="form-control"  rows="4">{{ old('short_description') }}</textarea>
                                </div>

                                <div class="col-md-12  form-group">
                                    <label>Description:</label>
                                    <textarea name="description" id="description" class="form-control summernote"  rows="4">{{ old('description') }}</textarea>
                                </div>


                                <div class="col-md-12  form-group">
                                    <label>Additional Info:</label>
                                    <textarea name="additional_info"  class="form-control summernote"  rows="4">{{ old('additional_info') }}</textarea>
                                </div>

                                <div class="col-md-12  form-group mb-4">
                                    <label>Product Gallery:</label>
                                    <input type="file" class="form-control" name="gallery_photo[]" multiple>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
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
    <link rel="stylesheet" href="{{ asset('backendapp/css/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backendapp/css/select2.min.css') }}">
@endsection
@section('backend__js')
    <script src="{{ asset('backendapp/js/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('backendapp/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select-multiple').select2();
            $('.toast').toast('show');
            $('.summernote-bs4').summernote({
                height: 150,
                toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link',]],
                ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
@endsection
