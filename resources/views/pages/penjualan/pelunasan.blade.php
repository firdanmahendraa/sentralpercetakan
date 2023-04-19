@extends('layouts.master')

@section('title', 'Transaksi Penjualan')

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
            <div class="card-header">
              <h3 class="card-title"><i class="fa fa-credit-card mr-1"></i> Pelunasan NT-{{ tambah_nol_didepan($pelunasan->no_nota, 5) }}</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"> <i class="fas fa-minus"></i> </button>
              </div>
            </div>

            <div class="card-body">
              <form action="{{ route('transaksi-penjualan.store') }}" class="form-transaksi" method="POST" id="simpanTransaksi">
                @csrf
                <input type="hidden" name="id_penjualan" value="{{ $pelunasan->id_penjualan }}">
                <input type="hidden" name="total_item" id="total_item" value="{{ $pelunasan->total_item }}">
                <input type="hidden" name="kembali" id="kembali">
                <input type="hidden" name="status_penjualan" id="status_penjualan">
              <div class="row">
                <div class="col-md-6">
                  <div class="row mb-2">
                    <div class="col-md-3 text-right mb-2">
                      <label for="" class="col-form-label" style="text-align:right">Acc Design *</label>
                    </div>
                    <div class="col-md-9">
                      <input type="text" id="acc_desain" name="acc_desain" class="form-control" style="border-radius: 0" placeholder="Acc design" value="{{ $pelunasan->acc_desain }}" readonly>
                    </div>
                    <div class="col-md-3 text-right">
                      <label for="" class="col-form-label" style="text-align:right">Pelanggan *</label>
                    </div>
                    <div class="col-md-9">
                      <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" style="border-radius: 0" placeholder="Nama Pelanggan" value="{{ $pelunasan->customer['nama_pelanggan'] }}" readonly>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-3 text-right">
                      <label for="" class="col-form-label" style="text-align:right">Diskon (Rp)</label>
                    </div>
                    <div class="col-md-9">
                      <input type="number" name="diskon" id="diskon" class="form-control" style="border-radius: 0" placeholder="Masukan nama pesanan" value="{{ $pelunasan->diskon }}" readonly>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row mb-2">
                    <div class="col-md-3 text-right">
                      <label for="" class="col-form-label" style="text-align:right">Invoice *</label>
                    </div>
                    <div class="col-md-9 mb-2">
                      <input type="text" name="no_nota" id="no_nota" class="form-control" style="border-radius: 0" value="{{ tambah_nol_didepan($pelunasan->no_nota, 5) }}" readonly>
                    </div>
                    <div class="col-md-3 text-right">
                      <label for="" class="col-form-label " style="text-align:right">Total Tagihan</label>
                    </div>
                    <div class="col-md-9">
                      <input type="text" class="form-control form-payment" id="totalTagihan" value="Rp. {{ $pelunasan->kembali }}" readonly>
                      <input type="hidden" class="form-control" name="total_harga" id="bayarTagihan" value="{{ $pelunasan->kembali }}">
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-3 text-right">
                      <label for="" class="col-form-label" style="text-align:right">Opsi Pembayaran</label>
                    </div>
                    <div class="col-md-9">
                      <select name="opsi_pembayaran" id="opsi_pembayaran" class="form-control">
                          <option value="tunai">Tunai</option>
                        @foreach ($opsi_bayar as $item)
                          <option value="{{ $item->opsi_pembayaran }}">{{ $item->opsi_pembayaran }} - {{ $item->nomor_rekening }} A/n {{ $item->atas_nama }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 text-right mb-2">
                      <label for="" class="col-form-label" style="text-align:right">Jumlah Bayar *</label>
                    </div>
                    <div class="col-md-9">
                      <input type="number" name="diterima" id="diterima" class="form-control" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 text-right">
                      <label for="" class="col-form-label" style="text-align:right">Kembali</label>
                    </div>
                    <div class="col-md-9">
                      <input type="text" id="sisa" class="form-control form-payment2" value="0" readonly>
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

@section('js')
  <script>
    let table;
    $(function(){
      //VALIDATOR SIMPAN TRANSAKSI
      $('#simpanTransaksi').on('submit',function(e){
        if (! e.preventDefault()) {
        $('.btn-simpan').html('<i class="fa fa-spinner fa-spin"></i> Proses');
        $('.btn-simpan').attr('type', 'button');
        var request = new FormData(this);
          $.ajax({
            url : $('#simpanTransaksi').attr('action'),
            type: 'post',
            data: request,
            data: $('#simpanTransaksi').serialize()
          })
          .done((response) => {
            $('.btn-simpan').html('<i class="fa fa-shopping-cart"></i> Proses Transaksi');
            Swal.fire({
              icon: 'success',
              title: 'Transaksi berhasil disimpan',
              timer: 2000
            })
          })
          .fail((errors) => {
            $('.btn-simpan').html('<i class="fa fa-shopping-cart"></i> Proses Transaksi');
            Swal.fire({
              icon: 'error',
              title: 'Transaksi gagal disimpan!',
              showConfirmButton: false,
            })
            return;
          });
        }
      })

    });
    
    //LOAD TOTAL 
    function loadForm(diskon = 0, diterima = 0) {
      $('#total').val($('.total').text());

      $.get(`{{ url('transaksi-baru/loadform') }}/${diskon}/${$('.total').text()}/${diterima}`)
        .done(response => {
          $('#totalrp').text('Rp. '+ response.subtotal);
          $('#totalTagihan').val('Rp. '+ response.tot_tagih);
          $('#sisa').val('Rp. '+ response.kembalirp);

          $('#bayarTagihan').val(response.bayar_tagih);
          $('#kembali').val(response.kembalirp);

          if ($('#kembali').val() >= 0) {
            $('#status_penjualan').val('1');
          }else{
            $('#status_penjualan').val('2');
          }

        })
        .fail(errors => {
          alert('Tidak dapat menampilkan data');
          return;
        })
    }

    //SET VALUE KEMBALI
    $('#diterima').on('input', function(){
      if($(this).val() == ""){
         $(this).val(0).select();
      }
      loadForm($('#diskon').val(), $(this).val());
    })


  </script>
@endsection
