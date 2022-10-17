@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Business Setup</h1>
                    @include('flash::message')
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard/business-setup</a></li>
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
                    <form action="{{ url("/dashboard/business/$business->id") }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="card card-primary card-outline">
                            <div class="card-body">
                                <div class="row col-lg-12">
                                    <div class="col-lg-8">
                                        <div>
                                            <label for="name" class="form-label">Business Name</label>
                                            <input type="text" class="form-control" name="name" id="name" placeholder=""
                                                value="{{ $business->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="business_type_id" class="form-label">Business Type <span
                                                style="color: green">({{
                                                $business->businessType->name }})</span></label>
                                        <select name="business_type_id" class="form-control" id="business_type_id">
                                            <option value="">--Please select</option>
                                            @foreach ($business_types as $item)
                                            <option value="{{ $item->id }}" <?php if($business->business_type_id ==
                                                $item->id)
                                                echo "selected" ?>>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row col-lg-12">
                                    <div class="col-lg-6 mt-3">
                                        <label for="playstore_url" class="form-label">Playstore URL</label>
                                        <input type="text" name="playstore_url" class="form-control" id="playstore_url"
                                            placeholder="" value="{{ $business->website }}">
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <label for="appstore_url" class="form-label">Appstore URL</label>
                                        <input type="text" name="appstore_url" class="form-control" id="appstore_url"
                                            placeholder="" value="{{ $business->website }}">
                                    </div>
                                </div>
                                <div class="row col-lg-12">
                                    <div class="col-lg-4 mt-3">
                                        <label for="house" class="form-label">House</label>
                                        <input type="text" name="house" class="form-control" id="house" placeholder=""
                                            value="{{ $business->house }}">
                                    </div>
                                    <div class="col-lg-4 mt-3">
                                        <label for="street" class="form-label">Street</label>
                                        <input type="text" class="form-control" name="street" id="street" placeholder=""
                                            value="{{ $business->street }}">
                                    </div>
                                    <div class="col-lg-4 mt-3">
                                        <label for="zone" class="form-label">Zone</label>
                                        <input type="text" class="form-control" id="zone" name="zone" placeholder=""
                                            value="{{ $business->zone }}">
                                    </div>
                                </div>
                                <div class="row col-lg-12">
                                    <div class="col-lg-6 mt-3">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" class="form-control" id="city" name="city" placeholder=""
                                            value="{{ $business->city }}" required>
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <label for="country" class="form-label">Country <span style="color: green">({{
                                                $business->country }})</span></label>
                                        <select name="country" class="form-control" id="country" required>
                                            <option value="Saudi Arabia" @selected($business->country == "Saudi
                                                Arabia")>Saudi Arabia</option>
                                            <option value="Bangladesh" @selected($business->country ==
                                                "Bangladesh")>Bangladesh</option>
                                            <option value="United Kingdom" @selected($business->country == "United
                                                Kingdom")>United Kingdom</option>
                                            <option value="United state of America" @selected($business->country ==
                                                "United state of America")>United Kingdom</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row col-lg-12">
                                    <div class="col-lg-6 mt-3">
                                        <label for="mobile" class="form-label">Mobile</label>
                                        <input type="text" class="form-control" id="mobile" placeholder="" name="mobile"
                                            value="{{ $business->mobile }}" required>
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder=""
                                            value="{{ $business->email }}" required>
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
