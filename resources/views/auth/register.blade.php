@extends('layouts.auth')

@section('title', 'Register')

@section('this-page', 'register-page')

@section('content')
<div class="register-box">
    <div class="register-logo">
      <a href="{{ url('/') }}">
        <img src="{{ asset('img/7Sheep.png') }}" class="w-25" alt="7Sheep Icon">
        {{ config('app.name') }}
    </a>
    </div>

    <div class="card">
      <div class="card-body register-card-body">
          @if (session()->has('success'))
          <p class="login-box-msg text-success">{{ session()->get('success') }}</p>
          @else
          <p class="login-box-msg">Register a new membership</p>
          @endif
        <form action="{{ url('register') }}" method="POST" autocomplete="off">
            @csrf
          <div class="input-group mb-3">
            <input name="username" value="{{ old('username') }}" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-signature"></span>
              </div>
            </div>
            @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>

          <div class="input-group mb-3">
            <input name="first_name" value="{{ old('first_name') }}" type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            @error('first_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>

          <div class="input-group mb-3">
            <input name="last_name" value="{{ old('last_name') }}" type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            @error('last_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <div class="custom-control custom-radio custom-control-inline">
                <input name="gender" value="M" type="radio" class="custom-control-input @error('gender') is-invalid @enderror" id="male" {{ old('gender') == 'M' ? 'checked' : ''}}>
                <label class="custom-control-label" for="male">Male</label>
            </div>

            <div class="custom-control custom-radio custom-control-inline">
                <input name="gender" value="F" type="radio" class="custom-control-input @error('gender') is-invalid @enderror" id="female" {{ old('gender') == 'F' ? 'checked' : '' }}>
                <label class="custom-control-label" for="female">Female</label>
            </div>
          </div>

          <div class="input-group mb-3">
            <input name="birth" value="{{ old('birth') }}" type="date" class="form-control @error('birth') is-invalid @enderror">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-birthday-cake"></span>
              </div>
            </div>
            @error('birth')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>

          <div class="input-group mb-3">
            <input name="email" value="{{ old('email') }}" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>

          <div class="input-group mb-3">
            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input name="password_confirmation" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Retype password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>

          <div class="row">
            <div class="col-8">
              <div class="custom-control custom-checkbox">
                <input name="terms" value="1" type="checkbox" class="custom-control-input @error('terms') is-invalid @enderror" id="terms" {{ !empty(old('terms')) ? 'checked' : ''}}>
                <label for="terms" class="custom-control-label">
                 I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        {{-- <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i>
            Sign up using Facebook
          </a>
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i>
            Sign up using Google+
          </a>
        </div> --}}

        <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->
@endsection
