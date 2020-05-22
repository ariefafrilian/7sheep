@extends('layouts.auth')

@section('title', 'Log In')

@section('this-page', 'login-page')

@section('content')
<div class="login-box">
    <div class="login-logo">
      <a href="{{ url('/') }}">
        <img src="{{ asset('img/7Sheep.png') }}" class="w-25" alt="7Sheep Icon">
        {{ config('app.name') }}
    </a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
          @if (session()->has('success'))
          <p class="login-box-msg text-success">{{ session()->get('success') }}</p>
          @elseif (session()->has('error'))
          <p class="login-box-msg text-danger">{{ session()->get('error') }}</p>
          @else
          <p class="login-box-msg">Sign in to start your session</p>
          @endif
        <form action="{{ url('login') }}" method="POST" autocomplete="off">
            @csrf
          <div class="input-group mb-3">
            <input name="email" type="email" class="form-control" placeholder="Email" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="password" type="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="custom-control custom-checkbox">
                <input name="remember" type="checkbox" class="custom-control-input" id="remember">
                <label for="remember" class="custom-control-label">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        {{-- <div class="social-auth-links text-center mb-3">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
          </a>
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
          </a>
        </div>
        <!-- /.social-auth-links --> --}}

        <p class="mb-1">
          <a href="{{ route('forgot.password') }}">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
@endsection
