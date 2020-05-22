@extends('layouts.auth')

@section('title', 'Recover Password')

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
        <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

        <form action="{{ url('reset-password/'.$encrypt) }}" method="POST">
            @method('PATCH')
            @csrf
          <div class="input-group mb-3">
            <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input name="password_confirmation" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Confirm Password">
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
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Change password</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <p class="mt-3 mb-1">
          <a href="{{ route('login') }}">Login</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
@endsection
