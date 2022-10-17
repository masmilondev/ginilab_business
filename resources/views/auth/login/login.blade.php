@extends('auth.layouts.app')

@section('content')
    <section class="w-100 p-4 d-flex justify-content-center pb-4">

        <form style="width: 22rem;" action="{{ url('login') }}" method="POST">
          @csrf
            <!-- Email input -->
            <div class="mb-2">Login</div>
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
                <label class="form-label" for="form2Example1" style="margin-left: 0px;">Email address</label>
                <input type="email" id="form2Example1" class="form-control" name="email">
                <div class="form-notch">
                    <div class="form-notch-leading" style="width: 9px;"></div>
                    <div class="form-notch-middle" style="width: 88.8px;"></div>
                    <div class="form-notch-trailing"></div>
                </div>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2" style="margin-left: 0px;">Password</label>
                <input type="password" id="form2Example2" class="form-control" name="password">
                <div class="form-notch">
                    <div class="form-notch-leading" style="width: 9px;"></div>
                    <div class="form-notch-middle" style="width: 64px;"></div>
                    <div class="form-notch-trailing"></div>
                </div>
            </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

                <!-- Register buttons -->
                <div class="text-center">
                    <p>Not a member? <a href="{{ url('/signup') }}">Register</a></p>
                </div>
        </form>
    </section>
@endsection
