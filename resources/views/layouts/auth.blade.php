<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="icon" type="image/x-icon" href="{{ $setting->logo_aplikasi }}" />
  <title>{{ $setting->nama_perusahaan }} | @yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  @include('includes.style')
  <style>
    .bg-login-image {
      background: url( {{ $setting->bg_login }} );
      background-position: center;
      background-size: cover;
    }
    .company-logo{
      content: url( {{ $setting->logo_login }} );
    }
  </style>
  @stack('css')
</head>
<body class="hold-transition login-page">
@yield('content')

@include('includes.script')
</body>
</html>
