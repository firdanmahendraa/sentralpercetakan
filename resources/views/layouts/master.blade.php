<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/icon.png') }}" />
    
    <title>@yield('title') - Sentral Percetakan</title>

    @include('includes.style')
    <style>
      nav, .nav-link{
        color: white;
      }
      .user {
        margin-top: 10px;
        display: flex;
        align-items: flex-start;
      }
      nav, .info{
        color: #212529;
      }
      .content-header{
        padding: 15px;
      }
      .card-header>.card-tools {
        padding-top: 4px;
      }
      
      .brand-link{
        padding: 0.66rem 0.5rem;
      }
      .brand-link .brand-image{
        margin-left: 0.5rem;
        margin-top: -5px;
        max-height: 40px;
      }
      .brand-text{
        height: 1.6rem;
      }
      
      /* Modal Style */
      .btn-simpan{
        background-color: #28A745; 
        color: #fff;
      }
      .btn-back{
        background-color: #e4bb05;
        color: #fff;
      }
    </style>
    @yield('css')
  </head>

  <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">
      <!-- Navbar -->
      @include('includes.navbar')

      <!-- Main Sidebar Container -->
      @include('includes.sidebar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6 ">
                <h1 class="m-0">@yield('title')</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @section('breadcrumbs')
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">@yield('title')</li>
                    @show
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        @yield('content')
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Main Footer -->
      @include('includes.footer')
    </div>
    <!-- ./wrapper -->
    
    @include('includes.script')
    @yield('js')
  </body>
</html>
