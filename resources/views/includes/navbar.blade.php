<nav class="main-header navbar navbar-expand navbar-primary ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <h5 class="mt-2">Aplikasi Sistem Administrasi Penjualan</h5>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <span class="mr-2">{{ Auth::user()->name }}</span><i class="fas fa-caret-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
          <form action="/logout" method="POST">
          @csrf
            <button type="submit" class="dropdown-item dropdown-footer">Logout</button>
          </form>
        </div>
      </li>

    </ul>
  </nav>