@extends('layouts.master')

@section('title', 'Transaksi Pembelian')

@push('css')
<style>
  .form-control{
    border-radius: 0!important;
  }
  .tampil-bayar{
    font-size: 4.5em;
    text-align: center;
    height: 120px;
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
        {{-- input pesanan --}}
        <div class="col-md-12"> 
          <div class="card card-info card-outline">
            <div class="card-header">
              <h3 class="card-title"><i class="fa fa fa-edit mr-1"></i> Input Pesanan</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"> <i class="fas fa-minus"></i> </button>
              </div>
            </div>
            
              <div class="card-body">
                <form id="addForm" method="POST" action="{{ route('transaksi_pembelian.addproduct') }}">
                  @csrf
                  @method('post')
                  <input type="hidden" name="id_pembelian" value="{{$id_pembelian->id}}">
                  <div class="row">
                    <div class="col-lg-6 col-md-6">
                      <div class="row">
                        <div class="col-lg-4 col-md-4 text-right">
                          <label for="" class="col-form-label">Nama Supplier *</label>
                        </div>
                        <div class="col-lg-8 col-md-8">
                          <input type="text" class="form-control mb-2" placeholder="Masukan nama pesanan" value="{{$supplier->nama_supplier}}" readonly>
                          <span class="help-block with-errors text-danger"></span>
                        </div>
                        <div class="col-lg-4 col-md-4 text-right">
                          <label for="" class="col-form-label">Kode Akun *</label>
                        </div>
                        <div class="col-lg-8 col-md-6">
                          <select class="get_kode_akun" type="hidden" name="id_akun" id="id_akun" required>
                            @foreach ($kode_akun as $item)
                              <option value="{{ $item->id }}" name="id_akun">{{ $item->id }} - {{ $item->nama_akun }}</option>
                            @endforeach
                          </select>
                          <span class="help-block with-errors text-danger"></span>
                        </div> 
                        <div class="col-lg-4 col-md-6"></div>
                        <div class="col-lg-8 col-md-12 mt-2">
                          <div class="row">
                            <div class="col-lg-6 col-md-12">
                              <div class="form-group">
                                <label for="namaProduk">Jumlah</label>
                                <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Masukkan jumlah" required>
                                <span class="help-block with-errors text-danger"></span>
                              </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                              <div class="form-group">
                                <label for="namaProduk">Satuan</label>
                                <input type="text" class="form-control" name="satuan" id="satuan" placeholder="rim/lbr/pack/dll" required>
                                <span class="help-block with-errors text-danger"></span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div> 
                    </div>
                    <div class="col-lg-6 col-md-6">
                      <div class="row">
                        <div class="col-lg-4 col-md-4 text-right">
                          <label for="" class="col-form-label" style="text-align:right">Nama Barang *</label>
                        </div>
                        <div class="col-lg-8 col-md-8">
                          <input type="text" name="uraian" id="uraian" class="form-control mb-2" placeholder="Masukan nama barang" required autofocus="">
                          <span class="help-block with-errors text-danger"></span>
                        </div>
                        <div class="col-lg-4 col-md-4 text-right">
                          <label for="" class="col-form-label" style="text-align:right">Harga *</label>
                        </div>
                        <div class="col-lg-8 col-md-8">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Rp</span>
                            </div>
                            <input type="number" class="form-control" name="harga" id="harga" placeholder="Masukkan harga" required>
                          </div>
                          <span class="help-block with-errors text-danger"></span>
                        </div> 
                      </div>
                    </div>
                  </div>
              </div>
              
              <div class="card-footer text-right" style="background-color: #fff">
                <button type="reset" class="btn btn-sm mr-2 btn-default reset"><i class="fa fa-times"></i> Batal</button>
                <button type="submit" class="btn btn-sm btn-info" id="tambahProduk"><i class="fas fa-check"></i> Tambahkan</button>
              </div>
            </form>
          </div>
        </div>
        {{-- detail transaksi --}}
        <div class="col-md-12">
          <div class="card card-info card-outline">
            <div class="card-header">
              <h3 class="card-title"><i class="fa fa-list-ul mr-1"></i> Detail Transaksi</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"> <i class="fas fa-minus"></i> </button>
              </div>
            </div>
            
            <div class="card-body px-0 pt-0">
              <div class="row">
                <div class="col-md-12">
                  <table class="table table-hover table-sm tableDetail" style="margin-top: 0px!important;width:100%">
                    <thead>
                      <tr>
                        <th width="3%">NO</th>
                        <th>KODE</th>
                        <th>NAMA BARANG</th>
                        <th>JUMLAH</th>
                        <th>TOTAL</th>
                        <th>OPSI</th>
                      </tr>
                    </thead>
                      <tbody></tbody>
                    <tfoot>
                      <tr class="text-bold">
                        <td colspan="4" class="text-right">Subtotal</td>
                        <td class="text-right" id="totalrp">0</td>
                        <td></td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        {{-- pembayaran transaksi --}}
        <div class="col-md-12">
          <div class="card card-info card-outline">
            <div class="card-header">
              <h3 class="card-title"><i class="fa fa-credit-card mr-1"></i> Pembayaran Transaksi</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"> <i class="fas fa-minus"></i> </button>
              </div>
            </div>

            <div class="card-body">
              <form action="{{ route('transaksi_pembelian.process_repayment') }}" class="form-transaksi" method="POST">
                @csrf
                <input type="hidden" name="id_pembelian" value="{{$id_pembelian->id}}">
                <input type="hidden" name="id_supplier" value="{{$supplier->id}}">
                <input type="hidden" name="bayar" id="diterima" disabled>
              <div class="row">
                <div class="col-md-6 pr-3"></div>
                <div class="col-md-6">
                  <div class="row mb-2">
                    <div class="col-lg-3 col-md-4 text-right">
                      <label for="" class="col-form-label" style="text-align:right">No Nota *</label>
                    </div>
                    <div class="col-lg-9 col-md-8">
                      <input type="text" name="no_nota" id="no_nota" class="form-control mb-2" placeholder="Masukan nomor nota" required>
                      <span class="help-block with-errors text-danger"></span>
                    </div>
                    <div class="col-md-3 text-right">
                      <label for="" class="col-form-label " style="text-align:right">Total Tagihan</label>
                    </div>
                    <div class="col-md-9">
                      <input type="text" class="form-control form-payment" id="totalTagihan" readonly>
                      <input type="hidden" class="form-control" name="sub_total" id="bayarTagihan">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 text-right mb-2">
                      <label for="" class="col-form-label" style="text-align:right">Status Pembayaran *</label>
                    </div>
                    <div class="col-md-9">
                      <select class="form-control" name="keterangan" id="keterangan">
                        <option name="Hutang" value="Hutang" selected>Hutang</option>
                        <option name="Lunas" value="Lunas">Bayar</option>
                      </select>
                      <div class="d-none mt-2" id="status_bayar">
                        <input type="text" id="sisa" class="form-control form-payment2" disabled>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      
            <div class="card-footer text-right" style="background-color: #fff">
              <button class="btn btn-sm btn-simpan" type="submit"><i class="fa fa-shopping-cart"></i> Proses Transaksi</button>
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
    $(document).ready(function () {
      //get supplier
      $('.get_kode_akun').select2();
      
      //get supplier
      $('#id_supplier').select2({
        placeholder: 'Cari Supplier',
        ajax: {
          url: "{{ route('transaksi_pembelian.getsupplier') }}",
          dataType: 'json',
          delay: 250,
          processResults: function(data) {
            return {
              results: $.map(data, function(item) {
                  return {
                    text: item.nama_supplier,
                    id: item.id
                  }
                })
              };
            },
            cache: true
          }
      });

      $("#keterangan").change(function(){
          if($(this).val() == "Lunas") {
            $('#status_bayar').removeClass("d-none");
            $("#diterima").removeAttr("disabled");
          } else {
            $('#status_bayar').addClass("d-none");
            $("#diterima").attr("disabled", "disabled");
          }
      });
    })

    //RESET BUTON
    $(".reset").click(function() {
      $('#tambahProduk').html('<i class="fa fa-check"></i> Tambahkan');
    });

    let table;
    $(function(){
      //VALIDATOR
      $('#addForm').on('submit',function(e){
        if (! e.preventDefault()) {
        $('#tambahProduk').html('<i class="fa fa-spinner fa-spin"></i> Proses');
        $('#tambahProduk').attr('type', 'button');
        var request = new FormData(this);
          $.ajax({
            url : $('#addForm').attr('action'),
            type: 'post',
            data: request,
            data: $('#addForm').serialize()
          })
          .done((response) => {
            table.ajax.reload();
            $('#tambahProduk').html('<i class="fa fa-check"></i> Tambahkan');
            $('#tambahProduk').attr('type', 'submit');
            $('#addForm').attr('action', `{{ route('transaksi_pembelian.addproduct') }}`);
            $('#addForm [name=_method]').val('post');
            $('#addForm')[0].reset();
            Swal.fire({
              icon: 'success',
              title: response,
              timer: 1500
            })
            table.ajax.reload();
          })
          .fail((response) => {
            $('#tambahProduk').html('<i class="fa fa-check"></i> Tambahkan');
            Swal.fire({
              icon: 'error',
              title: response.responseJSON.message,
              showConfirmButton: true,
            })
            return;
          });
        }
      })

      //TABEL DETAIL PENJUALAN
      table = $('.tableDetail').DataTable({
        processing: true, 
        serverSide: true,  
        paging: false, 
        searching: false, 
        ordering: false, 
        info: false,
        ajax:"{{ route('transaksi_pembelian.cart') }}",
        "language": {
          "emptyTable": "Belum ada detail transaksi."
        },
        columnDefs: [
          {
            "targets": [0,1,2,3,4,5],
            "className": "dt-head-center"
          },{
            "targets": [0,1,2,3,4,5],
            "className": "va-mid"
          },{
            "targets": [3,4],
            "className": "dt-body-right"
          },{
            "targets": [0,1,2,5],
            "className": "dt-body-center"
          }
        ],
        columns:[
          {data:'DT_RowIndex', name:'DT_RowIndex'},
          {data:'id_akun', name:'id_akun'},
          {data:'uraian', name:'uraian'},
          {data:'jumlah', name:'jumlah'},
          {data:'sub_total', name:'sub_total'},
          {data:'action', name:'action'},
        ],
      }).on('draw.dt', function(){ //Load Total Harga setelah perubahan pada tabel
        loadForm($('#diskon').val());
      });
    });

    //LOAD TOTAL 
    function loadForm(diterima = 0, total = 0) {
      $('#total_item').val($('.total_item').text());

      $.get(`{{ url('transaksi-pembelian/loadform') }}/${total}/${diterima}`)
        .done(response => {
          $('#totalrp').text('Rp. '+ response.subtotal);
          $('#totalTagihan').val('Rp. '+ response.subtotal);
          $('#sisa').val('Rp. '+ response.subtotal);
          
          $('#diterima').val(response.bayar_tagih);
          $('#bayarTagihan').val(response.bayar_tagih);
        })
        .fail(errors => {
          alert('Tidak dapat menampilkan data');
          return;
        })
    }

    //EDIT PRODUK TERPILIH
    $('body').on('click', '.editData', function () {
      let cart_id = $(this).data('id');

      //fetch data
      $.ajax({
        url: `/transaksi-pembelian/show/${cart_id}`,
        type: "GET",
        cache: false,
        success:function(response){
          $('#addForm').attr('action', `/transaksi-pembelian/update/${cart_id}`);
          $('#tambahProduk').html('<i class="fa fa-save"></i> Simpan');
          $('#no_nota').val(response.no_nota);
          $('#id_akun').val(response.id_akun);
          $('#id_akun').select2().trigger('change');
          $('#uraian').val(response.uraian);
          $('#jumlah').val(response.jumlah);
          $('#satuan').val(response.satuan);
          $('#harga').val(response.harga);
        },
        error:function(response){
          alert('Tidak dapat menampilkan data');
          return;
        }
      });
    });

    //HAPUS PRODUK TERPILIH
    function deleteData(url) {
      Swal.fire({
        title: 'Apakah anda yakin?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#dc3545',
        confirmButtonText: 'Ya!',
        cancelButtonText: 'Tidak'
      }).then((result) => {
        if (result.isConfirmed) {
          $.post(url,{
            '_token': $('[name=csrf-token]').attr('content'),
            '_method': 'delete'
          })
          .done((response) => {
            Swal.fire({
              icon: 'success',
              title: 'Data berhasil dihapus!',
              timer: 2000
            }) 
            table.ajax.reload();
          })
          .fail((errors) => {
            Swal.fire({
              icon: 'error',
              title: 'Data tidak dapat dihapus!',
            }) 
            return;
          })
        }
      })
    }

  </script>
@endsection
