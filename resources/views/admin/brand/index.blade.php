@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body">
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            <a href="#" class="btn btn-info mb-3 add-new-brand" data-toggle="modal"
                                data-target="#addNewBrand">Add New</a>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th class="brand">Brand</th>
                                        <th style="width: 100px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($brands as $item)
                                        <tr id="row_{{ $item->id }}">
                                            <td>{{ $i++ }}</td>
                                            <td id="brand_name_{{ $item->id }}">{{ $item->name }}</td>
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
    <script type="text/javascript">
        // get id of item when click on edit button
        $(document).on('click', '.edit', function() {
            var id = $(this).data('id');
            // Make brand_name id content editable of this id
            $('#brand_name_' + id).attr('contenteditable', 'true');
            // Add background color light grey of brand_name id
            $('#brand_name_' + id).css('background-color', '#FFF');

            // Remove edit button of this id
            $('#edit_' + id).css('display', 'none');

            // Add save button of this id
            $('#save_' + id).css('display', 'block');
        });

        $(document).on('click', '.save', function() {
            var id = $(this).data('id');
            // Save to database by ajax call

            $.ajax({
                url: "/dashboard/brand/" + id,
                method: "POST",
                dataType: "json",
                data: {
                    id: id,
                    name: $('#brand_name_' + id).text(),
                    _method: "PUT",
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    // data to json
                    console.log(data);
                    // Make brand_name id content editable of this id
                    $('#brand_name_' + id).attr('contenteditable', 'false');
                    // Add background color light grey of brand_name id
                    // Remove css from brand name
                    $('#brand_name_' + id).css('background-color', '');

                    // Remove edit button of this id
                    $('#edit_' + id).css('display', 'block');

                    // Add save button of this id
                    $('#save_' + id).css('display', 'none');
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });

        $(document).on('click', '.delete', function() {
            var id = $(this).data('id');

            $.ajax({
                url: "/dashboard/brand/" + id,
                method: "POST",
                dataType: "json",
                data: {
                    id: id,
                    _method: "DELETE",
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    // data to json
                    console.log(data);
                    if (data.success == true) {
                        $('#row_' + id).remove();
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    </script>
@stop
