@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body">
                            <div class="row form-group">
                                @include('flash::message')
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                            {{-- <a href="#" class="btn btn-info mb-3 add-new-brand" data-toggle="modal"
                                data-target="#addNewBrand">Add New</a> --}}
                            <form action="{{ url('/dashboard/category') }}" method="POST" id="addNewCategory" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="mt-1 col-lg-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder=""
                                            value="{{ old('name') }}">
                                    </div>
                                    <div class="col-lg-3 mt-1">
                                        <label for="parent_id" class="form-label">Parent Category</label>
                                        <select name="parent_id" class="form-control" id="parent_id">
                                            <option value="">--Please select</option>
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                              <div class="row">
                                <div class="col-lg-3 mt-1">
                                    <label for="color" class="form-label">Color</label>
                                    <select name="color" class="form-control" id="color">
                                        <option value="">--Please select</option>
                                        @foreach ($colors as $item)
                                            <option value="{{ $item }}">{{ ucwords($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-3 mt-1">
                                    <label for="category_image"
                                            class=" form-control-label">Category image</label>
                                    <div class="col-12 col-md-9"><input type="file" id="category_image"
                                            name="image" class="form-control">
                                    </div>
                                </div>
                              </div>
                                <div class="col-lg-4 mt-1">
                                    <div class="form-group clearfix">
                                        <div class="icheck-success d-inline">
                                            <input type="checkbox" id="exclude_from_discount" name="exclude_from_discount" value="1">
                                            <label for="exclude_from_discount">
                                                Exclude from discount
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label for="show_on" class="form-label">Show on</label>
                                    <select name="show_on" class="form-control" id="show_on">
                                        <option value="">--Please select</option>
                                        @foreach ($show_on as $item)
                                            <option value="{{ $item }}">{{ ucwords($item) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="mt-2 mb-5">
                                    <button type="submit" class="btn btn-primary">Add Category</button>
                                </div>
                            </form>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th class="brand">Category</th>
                                        <th class="brand">Parent Category</th>
                                        <th class="brand">Color</th>
                                        <th class="brand">Image</th>
                                        <th class="brand">Exclude from discount</th>
                                        <th class="brand">show on</th>
                                        <th style="width: 100px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($categories as $item)
                                        <tr id="row_{{ $item->id }}">
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->parent ? $item->parent->name : "" }}</td>
                                            <td>{{ $item->color }}</td>
                                            <td>
                                                <img src="{{ asset('storage/'.$item->image) }}" alt="" style="height: 100px">
                                            </td>

                                            <td>{{ $item->exclude_from_discount }}</td>
                                            <td>{{ $item->show_on }}</td>
                                            <td>
                                                <span class="input-group-append">
                                                    <button type="submit" class="btn btn-primary mr-2 ml-2 edit"
                                                        id="edit_{{ $item->id }}"
                                                        data-id="{{ $item->id }}">EDIT</button>
                                                    <button type="submit" class="btn btn-success mr-2 ml-2 save"
                                                        style="display: none" id="save_{{ $item->id }}"
                                                        data-id="{{ $item->id }}">SAVE</button>
                                                    <button type="submit" class="btn btn-danger mr-2 ml-2 delete"
                                                        id="delete_{{ $item->id }}"
                                                        data-id="{{ $item->id }}">DELETE</button>
                                                </span>
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
    </div>



    {{-- Add new --}}
    <div class="modal fade" id="addNewBrand" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-info">
                <div class="modal-header">
                    <h4 class="modal-title text-center" id="myModalLabel">Add New Brand</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body modal-spa">
                    <form action="{{ url('/dashboard/brand') }}" method="POST">
                        @csrf
                        <div class="mt-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder=""
                                value="{{ old('name') }}">
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">ADD BRAND</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript"></script>
@stop
