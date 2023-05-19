@extends('layouts.master')

@section('title', 'Dashboard')

@push('css')
  <style>
    .va-mid{
      vertical-align: middle!important;
    }
  </style>
@endpush

@section('content')
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      @if (!isset($_SESSION['admin']))
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-6">
                    <p class="mt-1 mb-3">Sistem info: {{$now}}</p>
                  </div>
                  <div class="col-lg-6 text-right">
                    <button class="btn btn-sm btn-primary">Buat Laporan Harian</button>
                  </div>
                  
                  <div class="col-lg-4">
                    <div class="info-box" data-toggle="tooltip">
                      <span class="info-box-icon bg-blue"><i class="fa fa-arrow-circle-down"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Pemasukan Hari Ini</span>
                        <span class="info-box-number"><small>Rp</small> {{ format_uang($bkm) }}</span>
                        <span class="info-box-text"><small>Bulan Ini</small></span>
                        <span class="info-box-number"><small>Rp</small> {{ format_uang($bkm_month) }}</span>
                        <input type="hidden" id="pemasukan_bln_ini" value="252000">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="info-box">
                      <span class="info-box-icon bg-red"><i class="fa fa-arrow-circle-up"></i></span>
                      <div class="info-box-content">
                        <span class="info-box-text">Pengeluaran hari ini</span>
                        <span class="info-box-number"><span data-toggle="tooltip"><small>Rp</small>{{ format_uang($bkk_tot) }}</span> / 
                        <span data-toggle="tooltip" title="" data-original-title="Pengeluaran yang Terbayar+Pelunasan hari ini."><small>Rp</small>{{ format_uang($bkk) }}</span></span>
                        <span class="info-box-text"><small>Bulan Ini</small></span>
                        <span class="info-box-number">
                          <span data-toggle="tooltip" title="" data-original-title="Total Pengeluaran dalam satu bulan."><small>Rp</small>{{ format_uang($bkk_month_tot) }}</span> /
                          <span data-toggle="tooltip" title="" data-original-title="Pengeluaran Terbayar dalam satu bulan."><small>Rp</small>{{ format_uang($bkk_month) }}</span>
                        </span>
                        <input type="hidden" id="pengeluaran_bln_ini" value="0">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
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
                </div>
              </div>
            </div>
          </div>
      
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="card card-primary card-outline">       
              <div class="card-header">
                <div class="row">
                  <div class="col-md-6">
                    <h5 class="mt-1"><i class="fas fa-download mr-2"></i>Bukti Kas Masuk</h5>
                  </div>
                  <div class="col-md-6">
                    <div class="text-right">
                      <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#form_masuk">Tambah Transaksi</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body px-0 pt-0">
                <table class="table table-sm kasmasuk">
                  <thead>
                    <tr>
                      <th class="text-center va-mid" rowspan="2" width="20%">PERKIRAAN</th>
                      <th class="text-center" colspan="2" width="60%">URAIAN</th>
                      <th class="text-center va-mid" rowspan="2">JUMLAH</th>
                    </tr>
                    <tr>
                      <td>Keterangan</td>
                      <td class="text-right">No Invoice</td>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($bkm == null)
                      <tr>
                        <td class="text-center" colspan="4">Tidak ada transaksi hari ini</td>
                      </tr>
                    @else
                      @foreach ($bkm as $key => $item)
                      <tr>
                        <td class="text-center">{{ $key+1 }}</td>
                        <td>
                          @if ($item->id_penjualan == null)
                            {{ $item->id_kas_masuk }}
                          @else
                            {{ $item->penjualan->customer['nama_pelanggan'] }} 
                          @endif
                        </td>
                        <td class="text-right">{{ $item->penjualan['no_nota'] }}</td>
                        <td class="text-right pr-2">Rp. {{ format_uang($item->debet) }}</td>
                      </tr>
                      @endforeach
                    @endif
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="3" class="text-right"><b>Total</b></td>
                      <td class="text-right pr-2"><b>Rp. {{ format_uang($bkm) }}</b></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-lg-6">
            <div class="card card-primary card-outline">       
              <div class="card-header">
                <div class="row">
                  <div class="col-md-6">
                    <h5 class="mt-1"><i class="fas fa-upload mr-2"></i> Bukti Kas Keluar</h5>
                  </div>
                  <div class="col-md-6">
                    <div class="text-right">
                      <button class="btn btn-sm btn-success">Tambah Transaksi</button>
                    </div>
                  </div>
                </div>
              </div> 
              <div class="card-body px-0 pt-0" style="">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th class="text-center" rowspan="2" width="20%">PERKIRAAN</th>
                      <th class="text-center"width="60%">URAIAN</th>
                      <th class="text-center" rowspan="2">JUMLAH</th>
                    </tr>
                  </thead>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      @else
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
                <span class="info-box-number"><small>Rp</small> {{ format_uang($bkm) }}</span>
                <span class="info-box-text"><small>Bulan Ini</small></span>
                <span class="info-box-number"><small>Rp</small> {{ format_uang($bkm_month) }}</span>
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

      @endif
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection