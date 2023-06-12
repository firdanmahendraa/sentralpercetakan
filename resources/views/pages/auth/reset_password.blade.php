@extends('layouts.auth')

@section('title', 'Reset Password')

@push('css')
    <style>
        .login-box{
            width: 600px;
        }
    </style>
@endpush

@section('content')
<div class="login-box">
    <div class="card">
        <div class="card-header text-center">
            <h1>Reset Password</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('password_update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-right">Email Active</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-right">Password</label>
                    <div class="col-md-8">
                        <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-right">Confirm Password</label>
                    <div class="col-md-8">
                        <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-0">
                    <div class="col-3 offset-4">
                        <a href="{{ route('login') }}" class="btn btn-default btn-block">Batal</a>
                    </div>
                    <div class="col-md-4 offset-1">
                        <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@include('includes.script')
</body>
</html>
