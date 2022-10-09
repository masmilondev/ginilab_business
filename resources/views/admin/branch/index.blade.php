@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
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
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
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
                    <form action="{{ url("admin/branch-setup/$branch->id") }}" method="post">
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
                                            <option value="{{ $item->id }}" <?php if($branch->service_type_id ==
                                                $item->id)
                                                echo "selected" ?>>{{ $item->name }}</option>
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
                                        <label for="country" class="form-label">Country</label>
                                        <input type="text" class="form-control" id="country" name="country"
                                            placeholder="" value="{{ $branch->country }}" required>
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
</div>
@endsection
