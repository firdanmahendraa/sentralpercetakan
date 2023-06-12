@extends('layouts.auth')

@section('title', 'Login')

@push('css')
  <style>
    .o-hiden{
      overflow: hidden;
    }
    .login-box{
      width: 900px;
    }
    .login-form{
      padding-left: 40px;
      padding-right: 40px;
      padding-top: 80px;
      padding-bottom: 80px;
    }
    .company-logo{
      width: 50%;
      align-items: center;
      margin-bottom: 10px;
    }
  </style>
@endpush

@section('content')
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card border-0 o-hiden shadow-lg">
    <div class="card-body p-0">
      <div class="row">
        <div class="col-lg-6 bg-login-image"></div>
        <div class="col-lg-6">
          <div class="login-form">
            <div class="text-center">
              <img class="company-logo">
            </div>
            <p class="login-box-msg">Silahkan masuk terlebih dahulu</p>
            <form method="POST" action="/">
            @csrf
              <div class="row mb-3">
                <label for="username" class="col-md-3 col-form-label text-md-end">Username</label>
                <div class="col-md-9">
                  <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" autofocus>
                  @error('username')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="password" class="col-md-3 col-form-label text-md-end">Password</label>
                <div class="col-md-9">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="col-md-5 offset-md-3">
                  <a href="{{route('login_identify')}}">Lupa Password?</a>
                </div>
                <div class="col-md-4">
                  <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
@endsection

@include('includes.script')
</body>
</html>
