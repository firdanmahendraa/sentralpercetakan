@extends('layouts.master')

@section('title', 'Transaksi Penjualan')

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
      <div class="row">
        {{-- @if(isset($response))
        {{ $response['message'] }}
        @endif --}}
        {{-- detail transaksi --}}
        @if(isset($detail))
        <div class="col-md-12">
          <div class="card card-info card-outline">
            <div class="card-header">
              <div class="row">
                <div class="col-sm-4 col-xs-12">
                  <table class="custom-table">
                    <tbody>
                      <tr>
                        <td width="100">Invoice</td>
                        <td>: <b>{{ $detail->no_nota }}</b></td>
                      </tr>
                      <tr>
                        <td>Kasir</td>
                        <td>: <b>{{ $detail->users['name'] }}</b></td>
                      </tr>
                      <tr>
                        <td>Tanggal</td>
                        <td>: <b>{{ $detail->created_at->translatedFormat('d F Y') }}</b></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="col-sm-4 hidden-xs"></div>
                <div class="col-sm-4 col-xs-12">
                  <table class="custom-table">
                    <tbody>
                      <tr>
                        <td width="100">Pelanggan</td>
                        <td>: <b>{{ $detail->customer['nama_pelanggan'] }}</b></td>
                      </tr>
                      <tr>
                        <td>No Telp</td>
                        <td>:  <b>{{ $detail->customer['telepon_pelanggan'] }}</b></td>
                      </tr>
                      <tr>
                        <td>Alamat</td>
                        <td>: <b>{{ $detail->customer['alamat_pelanggan'] }}</b></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            
            <div class="card-body pt-0 px-0">
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-hover" id="tableDetail" style="width:100%; margin-top: 0px !important;">
                    <thead>
                      <tr>
                        <th width="3%">NO</th>
                        <th width="20%">NAMA PESANAN</th>
                        <th class="text-center">UKURAN</th>
                        <th class="text-center" width="20%">HARGA</th>
                        <th class="text-center" width="10%">QTY</th>
                        <th class="text-center" width="20%">TOTAL</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($penjualan_detail as $key => $det)
                        <tr>
                          <td class="va-mid" style="vertical-align: middle">{{ $key+1 }}</td>
                          <td>{{ $det->nama_pesanan }}<br>
                              <small class="text-muted">{{ $det->produk['nama_produk'] }} / {{ $det->det_pesanan }} - {{ $det->finishing_plong_qty }}</small>
                          </td>
                          <td class="text-center va-mid">{{ $det->ukuran }}</td>
                          <td class="text-right va-mid">Rp. {{ format_uang($det->harga) }}</td>
                          <td class="text-right va-mid">{{ $det->jumlah }} {{ $det->satuan }}</td>
                          <td class="text-right va-mid">Rp. {{ format_uang($det->sub_total) }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                    <tfoot>
                      <tr class="">
                        <td colspan="2">
                          <small class="text-muted">Rincihan Pembayaran:</small><br>
                          @foreach ($det_history as $item)
                            Rp. {{ format_uang($item->debet) }} ({{ $item->opsi_pembayaran }}) // {{ $item->created_at->translatedFormat('d F Y') }}    <br>                           
                          @endforeach
                        </td>
                        <td colspan="3" class="text-right">
                            Subtotal <br>
                          @if ($detail->diskon > 0)
                            Diskon <br>
                          @endif
                          <b>Grand Total</b> <br>
                          @if ($detail->kembali >= 0)
                            Bayar<br>
                            Kembali<br>
                          @else
                            DP<br>
                            Kurang 
                          @endif                          
                        </td>
                        <td class="text-right" id="totalrp">
                             Rp. {{ format_uang($total) }} <br>
                          @if ($detail->diskon > 0)
                             Rp. {{ format_uang($detail->diskon) }} <br>
                          @endif
                          <b>Rp. {{ format_uang($detail->total_harga) }}</b> <br>
                          @if ($detail->kembali >= 0)
                             Rp. {{ format_uang($detail->diterima + $detail->kembali) }} <br>
                          @else
                             Rp. {{ format_uang($detail->diterima) }} <br>
                          @endif
                             Rp. {{ format_uang($detail->kembali) }}
                        </td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>

            <div class="card-footer">
              <div class="row">
                <div class="col-md-12">
                    <div class="text-right">
                      <a href="{{ route('transaksi-penjualan.edit', $detail->id_penjualan) }}" class="btn btn-default"><i class="fa fa-edit"></i>&nbsp;&nbsp;Edit</a>&nbsp;&nbsp;
                      @if ($detail->kembali < 0)
                        <a href="" class="btn btn-default"><i class="fas fa-check"></i>&nbsp;&nbsp;Lunasi</a>&nbsp;&nbsp;
                      @endif
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fas fa-print"></i>&nbsp;&nbsp;Cetak</button>
                      <div class="dropdown-menu dropdown-menu-right" style="">
                        <button class="dropdown-item" onclick="cetakInvoice('{{ url('transaksi-penjualan/invoice/'. $detail->id_penjualan, $detail->no_nota) }}')">Nota</button>
                        <button class="dropdown-item" onclick="cetakKwitansi('{{ url('transaksi-penjualan/kwitansi/'. $detail->id_penjualan, $detail->no_nota) }}')">Kwitansi</button>
                      </div>
                    </div>
                </div>
            </div>
            </div>
          </div>
        </div>
        @endif
      </div>
    </div>
  </section>
@endsection 

@section('js')
  <script>
    
    function cetakKwitansi(url, title) {
      popupCenter(url, title, 1080, 675)
    }

    function cetakInvoice(url, title) {
      popupCenter(url, title, 720, 675)
    }

    function popupCenter(url, title, w, h){
      const dualScreenLeft = window.screenLeft !==  undefined ? window.screenLeft : window.screenX;
      const dualScreenTop  = window.screenTop  !==  undefined ? window.screenTop  : window.screenY;

      const width  = window.innerWidth  ? window.innerWidth  : document.documentElement.clientWidth  ? document.documentElement.clientWidth  : screen.width;
      const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

      const systemZoom = width / window.screen.availWidth;
      const left       = (width - w) / 2 / systemZoom + dualScreenLeft
      const top        = (height - h) / 2 / systemZoom + dualScreenTop
      const newWindow  = window.open(url, title, 
        `
          scrollbars=yes,
          width  = ${w / systemZoom}, 
          height = ${h / systemZoom}, 
          top    = ${top}, 
          left   = ${left}
        `
      );

      if (window.focus) newWindow.focus();
  }
  </script>
@endsection
