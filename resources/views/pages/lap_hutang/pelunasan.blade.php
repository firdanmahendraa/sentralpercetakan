@extends('layouts.master')

@section('title', 'Pelunasan')

@push('css')
<style>
  .tampil-bayar{
    font-size: 4.5em;
    text-align: center;
    height: 120px;
  }

  #tableDetail tbody tr:last-child{
    display: none;
  }

  @media(max-width: 768px){
    .tampil-bayar{
      font-size: 3em;
      height: 70px;
      padding-top: 5px;
    }
  }
  .form-payment {
    font-size: 26px;
    font-weight: 700;
    text-align: right;
    height: 75px;
    background-color: #007bff;
    color: #fff;
    border-radius: 0;
  }
  .form-payment:disabled, .form-payment[readonly] {
    color: #fff;
    background-color: #007bff;
  }
  .form-payment::selection {
    color: yellow;
  }

  .form-payment2 {
    font-size: 26px;
    font-weight: 700;
    text-align: right;
    height: 75px;
    color: #fff;
    border-radius: 0;
  }
  .form-payment2:disabled, .form-payment2[readonly] {
    color: #000000;
    background-color: #e9ecef;
  }
  .va-mid{
    vertical-align: middle!important;
  }
</style>
@endpush

@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        {{-- pembayaran transaksi --}}
        <div class="col-md-12">
          <div class="card card-info card-outline">
            <div class="card-body">
              <div class="row invoice-info">
                <div class="col-lg-6 col-sm-6 invoice-col">
                  <table width="100%">
                    <tr>
                      <td width="20%">Nama</td>
                      <td><b>: {{$pelunasan->supplier['nama_supplier']}}</b></td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td><b>: {{$pelunasan->supplier['alamat_supplier']}}</b></td>
                    </tr>
                    <tr>
                      <td>Telepon</td>
                      <td><b>: {{$pelunasan->supplier['telepon_supplier']}}</b></td>
                    </tr>
                  </table>
                </div>
                <div class="col-lg-6 col-sm-6 invoice-col">
                  <table width="100%">
                    <tr>
                      <td width="40%">No Transaksi</td>
                      <td><b>: {{ $pelunasan->no_nota }}</b></td>
                    </tr>
                    <tr>
                      <td>Tanggal Transaksi</td>
                      <td><b>: {{$pelunasan->created_at->translatedFormat('d F Y')}}</b></td>
                    </tr>
                  </table>
                </div>
              </div>

              <table class="table table-sm table-striped mt-2 mb-4" style="width:100%">
                <thead>
                  <tr>
                    <th width="3%">NO</th>
                    <th width="20%">NAMA BARANG</th>
                    <th class="text-center" width="20%">JUMLAH</th>
                    <th class="text-center" width="10%">HARGA</th>
                    <th class="text-center" width="20%">TOTAL</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($pembelian_detail as $key => $det)
                    <tr>
                      <td class="va-mid" style="vertical-align: middle">{{ $key+1 }}</td>
                      <td>{{ $det->uraian }}</td>
                      <td class="text-center va-mid">{{ $det->jumlah }} {{ $det->satuan }}</td>
                      <td class="text-right va-mid">Rp. {{ format_uang($det->harga) }}</td>
                      <td class="text-right va-mid">{{ $det->jumlah }} {{ $det->satuan }}</td>
                      <td class="text-right va-mid">Rp. {{ format_uang($det->sub_total) }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <form action="{{ route('laporan_hutang.process_repayment') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $pelunasan->id }}">
              <div class="row">
                <div class="col-md-6"></div>
                <div class="col-lg-6 col-sm-12">
                  <div class="row mb-2">
                    <div class="col-md-3 text-right">
                      <label for="" class="col-form-label " style="text-align:right">Sisa Tagihan</label>
                    </div>
                    <div class="col-md-9">
                      <input type="text" class="form-control form-payment" value="Rp. {{ format_uang($pelunasan->sub_total) }}" readonly>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-3 text-right">
                      <label for="" class="col-form-label" style="text-align:right">Opsi Pembayaran</label>
                    </div>
                    <div class="col-md-9">
                      <select name="opsi_pembayaran" class="form-control">
                          <option value="Tunai">Tunai</option>
                        @foreach ($opsi_pembayaran as $item)
                          <option value="{{ $item->opsi_pembayaran }}">{{ $item->opsi_pembayaran }} - {{ $item->nomor_rekening }} A/n {{ $item->atas_nama }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 text-right">
                      <label for="" class="col-form-label" style="text-align:right">Jumlah Bayar *</label>
                    </div>
                    <div class="col-md-9">
                      <input type="text" id="sisa" class="form-control form-payment2" value="Rp. {{format_uang($sisa_tagihan)}}" readonly>
                      <input type="hidden" class="form-control" name="debet" value="{{ $sisa_tagihan }}">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card-footer text-right" style="background-color: #fff">
              <button class="btn btn-sm btn-simpan" type="submit"><i class="fa fa-shopping-cart"></i> Lunasi</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
