<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=  , initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Invoice {{ $penjualan->no_nota }}</title>
  <style>
    body{
      padding-left:10px;
      padding-right:10px;
    }
    hr{
      margin-left:10px;
      margin-right:10px;
      
    }
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
    .text-left{
      text-align: left;
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
<body style="">
  <div class="row">
    <div class="column3">
      <table>
        <tr>
          <td><b>{{ $setting->nama_perusahaan }}</b></td>
        </tr>
        <tr>
          <td>{{ $setting->alamat }}</td>
        </tr>
        <tr>
          <td>{{ $setting->telepon }}</td>
        </tr>
      </table>
    </div>
    <div class="column3">
      <div class="text-center"><h2>KWITANSI</h2></div>
    </div>
    <div class="column3">
      <table width="100%">
        <tr>
          <td width="10%"></td>
          <td width="40%">Kepada Yth. </td>
          <td>: {{ $penjualan->customer['nama_pelanggan'] }}</td>
        </tr>
        <tr>
          <td colspan="2" width="50%"></td>
          <td>&nbsp; {{ $penjualan->customer['alamat_pelanggan'] }}</td>
        </tr>
        <tr>
          <td width="10%"></td>
          <td width="40%">No Kwitansi</td>
          <td>: {{ $penjualan->no_nota }}</td>
        </tr>
        <tr>
          <td width="10%"></td>
          <td width="40%">Tanggal</td>
          <td>: {{ $penjualan->created_at->translatedFormat('d F Y') }}</td>
        </tr>
      </table>
    </div>
  </div>
  <hr style="border-top:2px solid; margin-top:0px">
  
  <table width="100%">
    <tr>
      <th class="text-center" width="5%">NO</th>
      <th class="text-left" width="80%" colspan="2">KETERANGAN</th>
      <th class="text-center" width="15%" colspan="3">JUMLAH</th>
    </tr>
    <td colspan="6"> 
      <hr style="border-top:2px solid">
    </td>
    @foreach ($det_angsuran as $key => $item)
    <tr>
      <td class="text-center">{{ $key+1 }}</td>
      <td colspan="2">Angsuran ke {{ $key+1 }}</td>
      <td colspan="3" class="text-right" style="padding-right:10px">Rp. {{ format_uang($item->debet) }}</td>
    </tr>
        
    @endforeach
    <tr>
      <td colspan="6"> 
        <hr>
      </td>
    </tr>
    <tr>
      <td class="text-right" colspan="5"><b>Total : </b></td>
      <td class="text-right" style="padding-right:10px"><b>Rp. {{ format_uang($total_bayar) }}</b></td>
    </tr>
  </table>
  <div class="row">
    <div class="column">
      <table>
        <tr>
          <td>Total Tagihan</td>
          <td>: Rp. {{ format_uang($penjualan->harga_akhir)}}</td>
        </tr>
        <tr>
          <td>Total Angsuran</td>
          <td>: Rp. {{ format_uang($total_bayar) }}</td>
        </tr>
        @if ($penjualan->harga_akhir - $total_bayar > 0)
        <tr>
          <td>Sisa Tagihan</td>
          <td>: Rp. {{ format_uang($penjualan->harga_akhir - $total_bayar ) }}</td>
        </tr>
        @else
        <tr>
          <td class="text-center" colspan="2" style="position: relative; transform:rotate(-15deg); color:rgba(0, 0, 0, 0.3); top:-60px"><h1><b>LUNAS</b></h1></td>
        </tr>
        @endif
      </table>
    </div>
    <div class="column">
      <table width="100%">
        <tr>
          <td class="text-right">{{ $penjualan->created_at->translatedFormat('d F Y') }}</td>
        </tr>
        <tr>
          <td><br><br><br></td>
        </tr>
        <tr>
          <td class="text-right">{{ $setting->nama_perusahaan }}</td>
        </tr>
      </table>
    </div>
  </div>
  </div>
</body>
</html>