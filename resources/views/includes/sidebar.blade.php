<aside class="main-sidebar sidebar-light-primary">
    <!-- Brand Logo -->
    <a href="#" class="brand-link bg-primary">
      <img src="{{ url($setting->logo_aplikasi) }}" alt="ASAP Logo" class="brand-image">
      <span class="brand-text font-weight-bold">{{ $setting->nama_perusahaan }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="">
        <div class="user-panel py-2 d-flex">
          <div class="image mt-3 mr-1" style="margin-left: 10px">
            <i class="fas fa-user"></i>
          </div>
          <div class="info">
            <span class="d-block">{{ Auth::user()->name }}</span>
            <i>{{ Auth::user()->levels }}</i>
          </div>
        </div>
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item mt-2">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-header">TRANSAKSI</li>
          <li class="nav-item {{request()->segment(1) == 'transaksi-baru' || 
                                request()->segment(1) == 'transaksi-penjualan' || 
                                request()->segment(1) == 'transaksi-pembelian' ? 'menu-is-opening menu-open' : '' }}">
            <a href="#" class="nav-link {{request()->segment(1) == 'transaksi-baru' || 
                                          request()->segment(1) == 'transaksi-penjualan' ||
                                          request()->segment(1) == 'transaksi-pembelian' ? 'active' : ''}}">
              <i class="nav-icon fa fa-shopping-cart"></i>
              <p>Transaksi<i class="fas fa-angle-left right"></i> </p>
            </a>
            <ul class="nav nav-treeview" style="{{ request()->segment(1) == 'transaksi-baru','transaksi-penjualan','transaksi-pembelian' ? 'display:block;' : 'display:none;' }}padding-top: 0px; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px;">
              <li class="nav-item">
                <a href="{{ route('transaksi-baru.index') }}" class="nav-link {{ request()->segment(1) == 'transaksi-baru' ? 'active' : ''}}">
                  <i class="fas fa-cart-plus nav-icon"></i>
                  <p>Transaksi Baru</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('transaksi-penjualan.index') }}" class="nav-link {{ request()->segment(1) == 'transaksi-penjualan' ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transaksi Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('transaksi_pembelian.index') }}" class="nav-link {{ request()->segment(1) == 'transaksi-pembelian' ? 'active' : ''}}">
                  <i class="fas fa-download nav-icon"></i>
                  <p>Transaksi Pembelian</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">MASTER</li>
          <li class="nav-item">
            <a href="{{ route('data-akun.index') }}" class="nav-link {{ (request()->segment(1) == 'data-akun') ? 'active' : '' }}">
              <i class="nav-icon fa fa-database"></i>
              <p>Kode Akun</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('data-produk.index') }}" class="nav-link {{ (request()->segment(1) == 'data-produk') ? 'active' : ''}}">
              <i class="nav-icon fas fa-barcode"></i>
              <p>Produk</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('opsi-pembayaran.index') }}" class="nav-link {{ (request()->segment(1) == 'opsi-pembayaran') ? 'active' : ''}}">
              <i class="nav-icon fa fa-credit-card"></i>
              <p>Opsi Pembayaran</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('data-pelanggan.index') }}" class="nav-link {{ (request()->segment(1) == 'data-pelanggan') ? 'active' : ''}}">
              <i class="nav-icon fa fa-user"></i>
              <p>Pelanggan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('data-supplier.index') }}" class="nav-link {{ (request()->segment(1) == 'data-supplier') ? 'active' : ''}}">
              <i class="nav-icon fa fa-truck"></i>
              <p>Supplier</p>
            </a>
          </li>
          <li class="nav-header">LAPORAN</li>
          <li class="nav-item">
            <a href="{{ route('pendapatan.index') }}" class="nav-link {{ request()->is('pendapatan') ? 'active' : ''}}">
              <i class="nav-icon fas fa-upload"></i>
              <p>Pendapatan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/laporan-pembelian" class="nav-link {{ request()->is('laporan-pembelian') ? 'active' : ''}}">
              <i class="nav-icon fa fa-download"></i>
              <p>Pembelian</p>
            </a>
          </li>
          </li>
          <li class="nav-header">SYSTEM</li>
          <li class="nav-item">
            <a href="/users" class="nav-link {{ request()->is('users') ? 'active' : ''}}">
              <i class="nav-icon fas fa-users"></i>
              <p>Manajemen Users</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('setting.index') }}" class="nav-link {{ (request()->segment(1) == 'setting') ? 'active' : ''}}">
              <i class="nav-icon fas fa-cogs"></i>
              <p>Pengaturan</p>
            </a>
          </li>
          <li class="nav-header">AdminLTE</li>
          <li class="nav-item">
            <a href="https://adminlte.io/themes/v3/" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Template</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>