@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="info-box" data-toggle="tooltip">
            <span class="info-box-icon bg-green"><i class="fa fa-shopping-cart"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Transaksi Hari Ini</span>
              <span class="info-box-number"><small>Rp</small> 184.500</span>
              <span class="info-box-text"><small>Bulan Ini</small></span>
              <span class="info-box-number"><small>Rp</small> 364.500</span>
              <input type="hidden" id="transaksi_bln_ini" value="364500">
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-arrow-circle-up"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Pengeluaran hari ini</span>
              <span class="info-box-number"><span data-toggle="tooltip">
                <small>Rp</small> 0</span> / <span data-toggle="tooltip" title="" data-original-title="Pengeluaran yang Terbayar+Pelunasan hari ini."><small>Rp</small> 0</span></span>
              <span class="info-box-text"><small>Bulan Ini</small></span>
              <span class="info-box-number">
                <span data-toggle="tooltip" title="" data-original-title="Total Pengeluaran dalam satu bulan."><small>Rp</small> 0</span> /
                <span data-toggle="tooltip" title="" data-original-title="Pengeluaran Terbayar dalam satu bulan."><small>Rp</small> 0</span>
              </span>
              <input type="hidden" id="pengeluaran_bln_ini" value="0">
            </div>
          </div>
        </div>
    
        <div class="clearfix visible-sm-block"></div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="info-box" data-toggle="tooltip">
            <span class="info-box-icon bg-yellow"><i class="fa fa-balance-scale"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Piutang Customer Hari Ini</span>
              <span class="info-box-number"><small>Rp</small> 112.500</span>
              <span class="info-box-text"><small>Bulan Ini / Total Piutang</small></span>
              <span class="info-box-number"><small>Rp</small> 112.500 / <small>Rp</small> 96.019.035</span>
              <input type="hidden" id="piutang_bln_ini" value="112500">
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="info-box" data-toggle="tooltip">
            <span class="info-box-icon bg-blue"><i class="fa fa-arrow-circle-down"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Pemasukan Hari Ini</span>
              <span class="info-box-number"><small>Rp</small> 72.000</span>
              <span class="info-box-text"><small>Bulan Ini</small></span>
              <span class="info-box-number"><small>Rp</small> 252.000</span>
              <input type="hidden" id="pemasukan_bln_ini" value="252000">
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="info-box" data-toggle="tooltip">
            <span class="info-box-icon bg-info"><i class="fas fa-check"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Pelunasan Hari Ini</span>
              <span class="info-box-number"><small>Rp</small> 0</span>
              <span class="info-box-text"><small>Dari Bulan Sebelumnya</small></span>
              <span class="info-box-number"><small>Rp</small> 0</span>
              <input type="hidden" id="pelunasan_bln_ini" value="0">
            </div>
          </div>
        </div>
    
        <div class="clearfix visible-sm-block"></div>
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="info-box" data-toggle="tooltip">
            <span class="info-box-icon bg-green"><i class="fas fa-thumbs-up"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Income Hari Ini</span>
              <span class="info-box-number"><small>Rp</small> 72.000</span>
              <span class="info-box-text"><small>Income Bulan Ini</small></span>
              <span class="info-box-number"><small>Rp</small> 252.000</span>
              <input type="hidden" id="keuntungan" value="252000">
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection