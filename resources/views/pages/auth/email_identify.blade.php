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
            @if (Session::has('message'))
                <p class="login-box-msg">{{ Session::get('message') }}</p>
            @else
                <p class="login-box-msg">Masukkan email Anda untuk mereset password.</p>
            @endif
                <form action="{{route('send_email')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-3 mt-1">
                            <a href="{{route('login')}}">Login</a>
                        </div>
                        <div class="col-3 offset-3">
                            <a href="{{url()->previous()}}" class="btn btn-default btn-block">Batal</a>
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn btn-primary btn-block">Kirim</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@endsection

@include('includes.script')
</body>
</html>
