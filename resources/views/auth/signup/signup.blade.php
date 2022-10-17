@extends('auth.layouts.app')


@section('content')

    <section class="w-100 p-4 d-flex justify-content-center pb-4">

        <form style="width: 22rem;" action="{{ url('/register') }}" method="POST">
            @csrf
            <!-- Email input -->
            <div class="mb-2">SIGN UP</div>

            @if ($errors->count() > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1" style="margin-left: 0px;">Name</label>
                <input type="text" id="form2Example1" class="form-control" value="{{ old('name') }}" name="name"
                    required>
                <div class="form-notch">
                    <div class="form-notch-leading" style="width: 9px;"></div>
                    <div class="form-notch-middle" style="width: 88.8px;"></div>
                    <div class="form-notch-trailing"></div>
                </div>
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1" style="margin-left: 0px;">Email address</label>
                <input type="email" id="form2Example1" class="form-control" value="{{ old('email') }}" name="email"
                    required>
                <div class="form-notch">
                    <div class="form-notch-leading" style="width: 9px;"></div>
                    <div class="form-notch-middle" style="width: 88.8px;"></div>
                    <div class="form-notch-trailing"></div>
                </div>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2" style="margin-left: 0px;">Password</label>
                <input type="password" id="form2Example2" class="form-control" name="password" required>
                <div class="form-notch">
                    <div class="form-notch-leading" style="width: 9px;"></div>
                    <div class="form-notch-middle" style="width: 64px;"></div>
                    <div class="form-notch-trailing"></div>
                </div>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2" style="margin-left: 0px;">Confirm Password</label>
                <input type="password" id="form2Example2" class="form-control" name="password_confirmation" required>
                <div class="form-notch">
                    <div class="form-notch-leading" style="width: 9px;"></div>
                    <div class="form-notch-middle" style="width: 64px;"></div>
                    <div class="form-notch-trailing"></div>
                </div>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Register</button>

            <!-- Register buttons -->
            <div class="text-center">
                <p>Already member? <a href="{{ url('/') }}">Login</a></p>

            </div>
        </form>
    </section>
@endsection
