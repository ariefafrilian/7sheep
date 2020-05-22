@extends('layouts.auth')

@section('title', 'Forgot Password')

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
          @else
          <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
          @endif


        <form action="{{ url('forgot-password') }}" method="POST" autocomplete="off">
            @csrf
          <div class="input-group mb-3">
            <input name="email" type="email" class="form-control" placeholder="Email" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Request new password</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <p class="mt-3 mb-1">
          <a href="{{ route('login') }}">Login</a>
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
