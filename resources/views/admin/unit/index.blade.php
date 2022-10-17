@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th class="unit">Unit</th>
                                        <th style="width: 100px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($units as $item)
                                        <tr id="row_{{ $item->id }}">
                                            <td>{{ $i++ }}</td>
                                            <td id="unit_name_{{ $item->id }}">{{ $item->name }}</td>
                                            <td>
                                                <span class="input-group-append">
                                                    <button type="submit" class="btn btn-primary mr-2 ml-2 edit"
                                                        id="edit_{{ $item->id }}"
                                                        data-id="{{ $item->id }}">EDIT</button>
                                                    <button type="submit" class="btn btn-success mr-2 ml-2 save"
                                                        style="display: none" id="save_{{ $item->id }}"
                                                        data-id="{{ $item->id }}">SAVE</button>
                                                    <button type="submit" class="btn btn-danger mr-2 ml-2 delete" id="delete_{{ $item->id }}"
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



    {{-- <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Branch Setup</h1>
                    @include('flash::message')
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard/branch-setup</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ url("/dashboard/branch-setup/$branch->id") }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="row col-lg-12">
                                    <div class="col-lg-8">
                                        <div>
                                            <label for="name" class="form-label">Branch name</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder=""
                                                value="{{ $branch->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="service_type_id" class="form-label">Service Type <span
                                                style="color: green">({{
                                                $branch->serviceType->name }})</span></label>
                                        <select name="service_type_id" class="form-control" id="service_type_id">
                                            <option value="">--Please select</option>
                                            @foreach ($service_types as $item)
                                            <option value="{{ $item->id }}" <?php if ($branch->service_type_id == $item->id) {
                                                echo 'selected';
                                            } ?>>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row col-lg-12">
                                    <div class="col-lg-4 mt-3">
                                        <label for="house" class="form-label">House</label>
                                        <input type="text" name="house" class="form-control" id="house" placeholder=""
                                            value="{{ $branch->house }}">
                                    </div>
                                    <div class="col-lg-4 mt-3">
                                        <label for="street" class="form-label">Street</label>
                                        <input type="text" class="form-control" name="street" id="street" placeholder=""
                                            value="{{ $branch->street }}">
                                    </div>
                                    <div class="col-lg-4 mt-3">
                                        <label for="zone" class="form-label">Zone</label>
                                        <input type="text" class="form-control" id="zone" name="zone" placeholder=""
                                            value="{{ $branch->zone }}">
                                    </div>
                                </div>
                                <div class="row col-lg-12">
                                    <div class="col-lg-6 mt-3">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" class="form-control" id="city" name="city" placeholder=""
                                            value="{{ $branch->city }}" required>
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <label for="country" class="form-label">Country <span style="color: green">({{
                                                $branch->country }})</span></label>
                                        <select name="country" class="form-control" id="country" required>
                                            <option value="Saudi Arabia" @selected($branch->country == "Saudi
                                                Arabia")>Saudi Arabia</option>
                                            <option value="Bangladesh" @selected($branch->country ==
                                                "Bangladesh")>Bangladesh</option>
                                            <option value="United Kingdom" @selected($branch->country == "United
                                                Kingdom")>United Kingdom</option>
                                            <option value="United state of America" @selected($branch->country ==
                                                "United state of America")>United Kingdom</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row col-lg-12">
                                    <div class="col-lg-6 mt-3">
                                        <label for="mobile" class="form-label">Mobile</label>
                                        <input type="text" class="form-control" id="mobile" placeholder="" name="mobile"
                                            value="{{ $branch->mobile }}" required>
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder=""
                                            value="{{ $branch->email }}" required>
                                    </div>
                                </div>
                                <div class="row col-lg-12">
                                    <div class="col-lg-6 mt-3">
                                        <label for="latitude" class="form-label">Latitude</label>
                                        <input type="text" name="latitude" class="form-control" id="latitude"
                                            placeholder="" value="{{ $branch->latitude }}">
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <label for="longitude" class="form-label">Longitude</label>
                                        <input type="text" name="longitude" class="form-control" id="longitude"
                                            placeholder="" value="{{ $branch->longitude }}">
                                    </div>
                                </div>
                                <div class="row col-lg-12">
                                    <div class="col-lg-4 mt-3">
                                        <label for="vat" class="form-label">VAT (%)</label>
                                        <input type="text" name="vat" class="form-control" id="vat" placeholder=""
                                            value="{{ $branch->vat }}">
                                    </div>
                                    <div class="col-lg-8 mt-3">
                                        <label for="vat_registration_number" class="form-label">VAT Registration
                                            Number</label>
                                        <input type="text" name="vat_registration_number" class="form-control"
                                            id="vat_registration_number" placeholder=""
                                            value="{{ $branch->vat_registration_number }}">
                                    </div>
                                </div>
                                <div class="row col-lg-12">
                                    <div class="row col-lg-4">
                                        <div class="col-lg-4 mt-3">
                                            <div class="form-group clearfix">
                                                <div class="icheck-success d-inline">
                                                    <input type="checkbox" id="is_halal" name="is_halal" value="1" {{
                                                        ($branch->is_halal == 1 ? 'checked' : '') }}>
                                                    <label for="is_halal">
                                                        Halal
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mt-3">
                                            <div class="form-group clearfix">
                                                <div class="icheck-success d-inline">
                                                    <input type="checkbox" id="cloud_sync" name="cloud_sync" value="1"
                                                        {{ ($branch->cloud_sync == 1 ? 'checked' : '') }}>
                                                    <label for="cloud_sync">
                                                        Cloud sync
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 mt-3">
                                            <div class="form-group clearfix">
                                                <div class="icheck-success d-inline">
                                                    <input type="checkbox" id="online_pre_order" name="online_pre_order"
                                                        value="1" {{ ($branch->online_pre_order == 1 ? 'checked' : '')
                                                    }}>
                                                    <label for="online_pre_order">
                                                        Online pre-order
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-3">
                                            <label for="busy_until" class="form-label">Busy until <span
                                                    style="color: green">
                                                    {{ $branch->busy_until && App\Helpers\DateTimeHelper::isNotExpired(new
                                                    DateTime($branch->busy_until)) ? "($branch->busy_until)" : "" }}
                                                </span></label>
                                            <select name="busy_until" class="form-control" id="busy_until">
                                                <option value="-">--- Please select</option>
                                                <option value="0">No</option>
                                                <option value="1">Next one hour</option>
                                                <option value="2">Next two hour</option>
                                                <option value="3">Next three hour</option>
                                                <option value="24">Today</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mt-3">
                                        <label for="vat_registration_number" class="form-label">VAT Registration
                                            Number</label>
                                        <input type="text" name="vat_registration_number" class="form-control"
                                            id="vat_registration_number" placeholder=""
                                            value="{{ $branch->vat_registration_number }}">
                                    </div>
                                </div>

                            </div>
                            <div class="row form-group">
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
                            <div class="col-lg-6 mb-3">
                                <button class="btn btn-primary btn-lg-6" type="submit">Update</button>
                            </div>
                        </div><!-- /.card -->
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div> --}}
@endsection

@section('scripts')
    <script type="text/javascript">
        // get id of item when click on edit button
        $(document).on('click', '.edit', function() {
            var id = $(this).data('id');
            // Make unit_name id content editable of this id
            $('#unit_name_' + id).attr('contenteditable', 'true');
            // Add background color light grey of unit_name id
            $('#unit_name_' + id).css('background-color', '#FFF');

            // Remove edit button of this id
            $('#edit_' + id).css('display', 'none');

            // Add save button of this id
            $('#save_' + id).css('display', 'block');
        });

        $(document).on('click', '.save', function() {
            var id = $(this).data('id');
            // Save to database by ajax call

            $.ajax({
                url: "/dashboard/unit/" + id,
                method: "POST",
                dataType: "json",
                data: {
                    id: id,
                    name: $('#unit_name_' + id).text(),
                    _method: "PUT",
                    _token: '{{ csrf_token() }}'
                },
                success: function(data) {
                    // data to json
                    console.log(data);
                    // Make unit_name id content editable of this id
                    $('#unit_name_' + id).attr('contenteditable', 'false');
                    // Add background color light grey of unit_name id
                    // Remove css from unit name
                    $('#unit_name_' + id).css('background-color', '');

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
                url: "/dashboard/unit/" + id,
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
