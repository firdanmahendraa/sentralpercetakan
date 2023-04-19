<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=  , initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Invoice Nt-</title>
  <style>
    * {
      box-sizing: border-box;
    }
    .row {
      display: flex;
    }
    .column {
      flex: 50%;
      padding: 10px;
    }
    .column3 {
      flex: 33.333333%;
      padding: 10px;
    }
    .text-right{
      text-align: right;
    }
    .text-center{
      text-align: center;
    }
    .va-mid{
      vertical-align: middle!important;
    }
    .text-muted {
      color: #6c757d!important;
    }
    .small, small {
      font-size: 80%;
      font-weight: 400;
    }
  </style>
</head>
<body>
  <div class="text-center">
    <img src="{{ url($setting->logo_nota) }}"  width="200px"><br>
    <label>{{ $setting->alamat }} | {{ $setting->telepon }}</label><br>
    {{ $penjualan->updated_at->translatedFormat('d F Y') }} - {{ $penjualan->updated_at->format('H:i:s') }}
  </div>
  <div class="row">
    <div class="column">
      <table>
        <tr>
          <td><b>No Nota</b></td>
          <td><b>:</b> NT-{{ $penjualan->no_nota }}</td>
        </tr>
        <tr>
          <td><b>Nama</b></td>
          <td><b>:</b> {{ $penjualan->customer['nama_pelanggan'] }}</td>
        </tr>
        <tr>
          <td><b>Alamat</b></td>
          <td><b>:</b> {{ $penjualan->customer['alamat_pelanggan'] }}</td>
        </tr>
        <tr>
          <td><b>Telepon</b></td>
          <td><b>:</b> {{ $penjualan->customer['telepon_pelanggan'] }}</td>
        </tr>
      </table>
    </div>
  </div>
  <hr style="border: 1px dashed">
  <table width="100%">
    <tr>
      <th class="text-center" width="3%">NO</th>
      <th width="30%">NAMA PESANAN</th>
      <th class="text-center">UKURAN</th>
      <th class="text-center" width="20%">HARGA</th>
      <th class="text-center" width="18%">QTY</th>
      <th class="text-center" width="15%">TOTAL</th>
    </tr>
    <td colspan="6"> 
      <hr style="border-top:1px solid">
    </td>
    @foreach ($det_penjualan as $key => $item)
      <tr>
        <td class="text-center va-mid" style="vertical-align: middle">{{ $key+1 }}</td>
        <td>{{ $item->nama_pesanan }}<br>
            <small class="text-muted">{{ $item->produk['nama_produk'] }} / {{ $item->det_pesanan }} - {{ $item->finishing_plong_qty }}</small>
        </td>
        <td class="text-center va-mid">{{ $item->ukuran }}</td>
        <td class="text-right va-mid">Rp. {{ format_uang($item->harga) }}</td>
        <td class="text-right va-mid">{{ $item->jumlah }} {{ $item->satuan }}</td>
        <td class="text-right va-mid">Rp. {{ format_uang($item->sub_total) }}</td>
      </tr>
    @endforeach
    <tr>
      <td colspan="6"> 
        <hr>
      </td>
    </tr>
    <tr class="">
      <td colspan="4" style="vertical-align: top">
        Perhatian :<br>
        <small class="text-muted">
          1. Periksa file sebelum dicetak, kesalahan setelah cetak bukan tanggung jawab kami<br>
          2. Barang yang tidak diambil lebih dari 60 hari bukan tanggung jawab kami
        </small>
      </td>
      <td  class="text-right">
          Subtotal Rp<br>
        @if ($penjualan->diskon > 0)
          Diskon Rp<br>
        @endif
        <b>Grand Total Rp</b> <br>
        @if ($penjualan->kembali >= 0)
          Bayar Rp<br>
          Kembali Rp<br>
        @else
          DP Rp<br>
          Kurang Rp 
        @endif
      </td>
      <td class="text-right" id="totalrp">
           {{ format_uang($total) }} <br>
        @if ($penjualan->diskon > 0)
           {{ format_uang($penjualan->diskon) }} <br>
        @endif
        <b>{{ format_uang($penjualan->total_harga) }}</b> <br>
        @if ($penjualan->kembali >= 0)
          {{ format_uang($penjualan->diterima + $penjualan->kembali) }} <br>
        @else
          {{ format_uang($penjualan->diterima) }} <br>
        @endif
           {{ format_uang($penjualan->kembali) }}
      </td>
    </tr>
  </table>
  <hr style="border: 1px dashed">
  <div class="row">
    <div class="column3">
      <div class="text-center">
        Penerima
      </div>
    </div>
    <div class="column3">
      <div class="text-center">
        Acc Design
        <br><br><br><br><br>
        ( {{ $penjualan->acc_desain }} )
      </div>
    </div>
    <div class="column3">
      <div class="text-center">
        Hormat Kami
        <br><br><br><br><br>
        ( {{ $penjualan->users['name'] }} )
      </div>
    </div>
  </div>
</body>
</html>