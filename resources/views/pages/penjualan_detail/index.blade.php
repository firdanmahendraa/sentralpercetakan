@extends('layouts.master')

@section('title', 'Transaksi Penjualan')

@push('css')
<style>
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
                <form id="addForm" method="POST" action="{{ route('transaksi-baru.store') }}">
                  @csrf
                  @method('post')
                <div class="row">
                  <div class="col-md-6">
                    <div class="row mb-2">
                      <div class="col-md-3 text-right">
                        <label for="" class="col-form-label" style="text-align:right">Nama Pesanan *</label>
                      </div>
                      <div class="col-md-9">
                        <input type="text" name="nama_pesanan" id="nama_pesanan" class="form-control" style="border-radius: 0" placeholder="Masukan nama pesanan" required>
                        <span class="help-block with-errors text-danger"></span>
                      </div>
                    </div>
                    <div class="row mb-2">
                      <div class="col-md-3 text-right">
                        <label for="" class="col-form-label" style="text-align:right">Qty *</label>
                      </div>
                      <div class="col-md-4">
                        <input type="number" name="jumlah" id="jumlah" class="form-control" style="border-radius: 0" placeholder="Masukan quantity" required>
                      </div>
                      <div class="col-md-2 text-right">
                        <label for="" class="col-form-label" style="text-align:right">Satuan *</label>
                      </div>
                      <div class="col-md-3">
                        <input type="text" name="satuan" id="satuan" class="form-control" style="border-radius: 0" placeholder="Cth: Rim/lembar/dll" required>
                        <span class="help-block with-errors text-danger"></span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 text-right">
                        <label for="" class="col-form-label" style="text-align:right">Det. Pesanan</label>
                      </div>
                      <div class="col-md-9">
                        <input type="text" name="det_pesanan" id="det_pesanan" class="form-control" style="border-radius: 0" placeholder="Cth: Finishing doff/glossy/lem tepi/dll" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="row mb-2">
                      <div class="col-md-3 text-right">
                        <label for="" class="col-form-label" style="text-align:right">Bahan *</label>
                      </div>
                      <div class="col-md-9">
                        <select class="produk" name="id_produk" id="id_produk" style="text-align:right" required>
                          <option value="">-- Jasa/Custom --</option>
                          @foreach ($produk as $p)
                            <option value="{{ $p->id_produk }}" name="id_produk" ukuran="{{ $p->ukuran_produk }}" type="{{ $p->type_produk }}" harga="{{ $p->harga_produk }}">{{ $p->kode_produk }} - {{ $p->nama_produk }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="row mb-2" id="ukuran-form-qty">
                      <div class="col-md-3 text-right">
                        <label for="" class="col-form-label" style="text-align:right">Ukuran *</label>
                      </div>
                      <div class="col-md-9">
                        <input type="text" name="ukuran" id="ukuran_produk" class="form-control" style="border-radius: 0" placeholder="Cth: A3/A4/F4/dll" required>
                      </div>
                    </div>
                    <div class="row mb-2 d-none" id="ukuran-form-meter">
                      <div class="col-md-3 text-right">
                        <label for="" class="col-form-label" style="text-align:right">Ukuran *</label>
                      </div>
                      <div class="col-md-4">
                        <input type="number" name="ukuran_p" id="ukuran_p" class="form-control" style="border-radius: 0" placeholder="panjang" required>
                      </div>
                      <div class="col-md-1 text-center"> <label for="" class="col-form-label">x</label> </div>
                      <div class="col-md-4">
                        <input type="number" name="ukuran_l" id="ukuran_l" class="form-control" style="border-radius: 0" placeholder="lebar" required>
                      </div>
                      <div class="col-md-2 offset-3 mt-3">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" name="is_plong" id="checkPlong" value="no">
                          <label class="form-check-label">Plong</label>
                        </div>
                      </div>
                      <div class="col-md-3 mt-2 text-right">
                        <label for="" class="col-form-label">Jumlah</label>
                      </div>
                      <div class="col-md-4 mt-2">
                        <input type="number" name="finishing_plong_qty" id="plongQty" class="form-control" style="border-radius: 0" placeholder="jumlah" disabled required>
                      </div>
                      <div class="col-md-3 offset-5 mt-2 text-right">
                        <label for="" class="col-form-label">Harga Plong</label>
                      </div>
                      <div class="col-md-4 mt-2">
                        <input type="number" name="finishing_plong_harga" id="plongPrice" class="form-control" style="border-radius: 0" placeholder="Rp" disabled required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3 text-right">
                        <label for="" class="col-form-label" style="text-align:right">Harga *</label>
                      </div>
                      <div class="col-md-9">
                        <input type="number" name="harga" id="harga_produk" class="form-control" style="border-radius: 0" placeholder="Masukan harga" required>
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
                  <table class="table table-hover table-sm" id="tableDetail" style="margin-top: 0px!important;width:100%">
                    <thead>
                      <tr>
                        <th width="3%">NO</th>
                        <th width="20%">NAMA PESANAN</th>
                        <th>UKURAN</th>
                        <th width="20%">HARGA</th>
                        <th width="10%">QTY</th>
                        <th>TOTAL</th>
                        <th width="10%">OPSI</th>
                      </tr>
                    </thead>
                      <tbody></tbody>
                    <tfoot>
                      <tr class="text-bold">
                        <td colspan="5" class="text-right">Subtotal</td>
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
              <form id="saveTransaction" action="{{ route('transaksi-penjualan.process') }}" class="form-transaksi" method="POST">
                @csrf
                <input type="hidden" name="kembali" id="kembali">
                <input type="hidden" name="id_akun" id="id_akun">
              <div class="row">
                <div class="col-md-6 pr-3">
                  <div class="row mb-2">
                    <div class="col-md-3 text-right mb-2">
                      <label for="" class="col-form-label" style="text-align:right">Acc Design *</label>
                    </div>
                    <div class="col-md-9">
                      <input type="text" id="acc_desain" name="acc_desain" class="form-control" style="border-radius: 0" placeholder="Acc design" required>
                    </div>
                    <div class="col-md-3 text-right">
                      <label for="" class="col-form-label" style="text-align:right">Pelanggan *</label>
                    </div>
                    <div class="col-md-8">
                      <input type="hidden" name="uraian" id="nama">
                      <select class="cariPelanggan" name="id_pelanggan" id="id_pelanggan" required>
                          <option value="">Pilih</option>
                        @foreach ($customer as $item)
                          <option nama="{{ $item->nama_pelanggan }}" value="{{ $item->id }}">{{ $item->nama_pelanggan }} ( {{ $item->alamat_pelanggan }} ) </option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-1 text-right" style="">
                      <input type="hidden" id="customer_opsi" name="customer_opsi" value="old">
                      <button type="button" id="addCustomer" class="btn btn-md bg-blue"><i class="fa fa-plus"></i></button>
                    </div>
                  </div>
                  <div id="form-customer" style="display: none;">
                    <div class="form-group row">
                      <label class="col-sm-3 text-right control-label">Nama Pelanggan *</label>
                      <div class="col-sm-9">
                        <input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" style="border-radius: 0" placeholder="Nama Pelanggan">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 text-right control-label">Telp. Pelanggan</label>
                      <div class="col-sm-9">
                        <input type="text" name="telepon_pelanggan" id="telepon_pelanggan" class="form-control" style="border-radius: 0" placeholder="Telp">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 text-right control-label">Alamat</label>
                      <div class="col-sm-9">
                        <textarea name="alamat_pelanggan" id="alamat_pelanggan" class="form-control" style="border-radius: 0"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-3 text-right">
                      <label for="" class="col-form-label" style="text-align:right">Diskon (Rp)</label>
                    </div>
                    <div class="col-md-9">
                      <input type="number" name="diskon" id="diskon" class="form-control" style="border-radius: 0" placeholder="Masukan nama pesanan" value="0">
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="row mb-2">
                    <div class="col-md-3 text-right">
                      <label for="" class="col-form-label" style="text-align:right">Invoice *</label>
                    </div>
                    <div class="col-md-9 mb-2">
                      <input type="text" name="no_nota" id="no_nota" class="form-control" style="border-radius: 0" value="{{$transcation_code}}" readonly>
                    </div>
                    <div class="col-md-3 text-right">
                      <label for="" class="col-form-label " style="text-align:right">Total Tagihan</label>
                    </div>
                    <div class="col-md-9">
                      <input type="text" class="form-control form-payment" id="totalTagihan" readonly>
                      <input type="hidden" class="form-control" name="total_harga" id="bayarTagihan">
                    </div>
                  </div>
                  <div class="row mb-2">
                    <div class="col-md-3 text-right">
                      <label for="" class="col-form-label" style="text-align:right">Opsi Pembayaran</label>
                    </div>
                    <div class="col-md-9">
                      <select name="opsi_pembayaran" id="opsi_pembayaran" class="form-control">
                          <option value="piutang">Piutang</option>
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
                      <input type="number" name="diterima" id="diterima" class="form-control" value="0" readonly required>
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
    //=========================== Transaksi Penjualan ============================
    $(document).ready(function() {
      //get produk
      $('.produk').select2();

      //Fungsi untuk merubah option sesuai dengan value yang dipilih
      $('.produk').change(function(){
        var value = $(this).val();
      })
      
      //get pelanggan lama 
      $('.cariPelanggan').select2({ placeholder: 'Cari nama - alamat pelanggan'});

      //Simpan Transaksi
      $('.btn-simpan').on('click', function(){
        $('.form-transaksi').submit();
      })
    });
    
    //GET VALUE KETIKA PRODUK DIPILIH
    $('#id_produk').change(function() {
      var ukuran_produk = $(this).find("option:selected").attr('ukuran');
      var harga_produk = $(this).find("option:selected").attr('harga');
      var type = $(this).find("option:selected").attr('type');
      $('#ukuran_produk').val(ukuran_produk);
      $('#harga_produk').val(harga_produk);
      $('#qty').val(1);
      if (type == 'qty') {
          $('#ukuran-form-qty').removeClass("d-none");
          $('#ukuran-form-meter').addClass("d-none");
          $("#ukuran_p").attr("disabled", "disabled");
          $("#ukuran_l").attr("disabled", "disabled");
      } else {
          $('#ukuran-form-qty').addClass("d-none");
          $('#ukuran-form-meter').removeClass("d-none");
          $("#ukuran_p").removeAttr("disabled", "disabled");
          $("#ukuran_l").removeAttr("disabled", "disabled");
      }
    });

    //ENABLE INPUT FORM WHEN PLONG CHECKED
    $("#checkPlong").click(function () {
      if ($(this).is(":checked")) {
        $("#checkPlong").val("yes");
        $("#det_pesanan").attr("required", "required");
        $("#plongQty").removeAttr("disabled");
        $("#plongPrice").removeAttr("disabled");
        $("#plongQty").focus();
      } else {
        $("#checkPlong").val("no");
        $("#det_pesanan").removeAttr("required");
        $("#plongQty").attr("disabled", "disabled");
        $("#plongPrice").attr("disabled", "disabled");
      }
    });

    //RESET BUTON
    $(".reset").click(function() {
      $('#id_produk').val('0');
      $('#select2-id_produk-container').html('-- Jasa/Custom --');
      $('#tambahProduk').html('<i class="fa fa-check"></i> Tambahkan');
      $('#ukuran-form-qty').removeClass("d-none");
      $('#ukuran-form-meter').addClass("d-none");
      $("#ukuran_p").attr("disabled", "disabled");
      $("#ukuran_l").attr("disabled", "disabled");
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
            $('#addForm').attr('action', `{{ route('transaksi-baru.store') }}`);
            $('#addForm [name=_method]').val('post');
            $('#addForm')[0].reset();
            $('#ukuran-form-qty').removeClass("d-none");
            $('#ukuran-form-meter').addClass("d-none");
            $("#checkPlong").val("no");
            $("#plongQty").attr("disabled", "disabled");
            $("#plongPrice").attr("disabled", "disabled");
            $('#id_produk').val('0');
            $('#select2-id_produk-container').html('-- Jasa / Custom --');
            Swal.fire({
              icon: 'success',
              title: response,
              timer: 1500
            })
            table.ajax.reload();
          })
          .fail((response) => {
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
      table = $('#tableDetail').DataTable({
        processing: true, 
        serverSide: true,  
        paging: false, 
        searching: false, 
        ordering: false, 
        info: false,
        ajax:"{{ route('transaksi-baru.cart') }}",
        "language": {
          "emptyTable": "Belum ada detail transaksi."
        },
        columnDefs: [
          {
            "targets": [0,2,3,4,5,6],
            "className": "dt-head-center"
          },{
            "targets": [0,2,3,4,5],
            "className": "va-mid"
          },{
            "targets": [3,4,5],
            "className": "dt-body-right"
          },{
            "targets": [0,2,6],
            "className": "dt-body-center"
          }
        ],
        columns:[
          {data:'DT_RowIndex', name:'DT_RowIndex'},
          {data:'nama_pesanan', name:'nama_pesanan'},
          {data:'ukuran', name:'ukuran'},
          {data:'harga', name:'harga'},
          {data:'jumlah', name:'jumlah'},
          {data:'sub_total', name:'sub_total'},
          {data:'action', name:'action', orderable: false, searchable: false},
        ],
      }).on('draw.dt', function(){ //Load Total Harga setelah dikasih diskon
        loadForm($('#diskon').val());
      });

    });
    
    //EDIT PRODUK TERPILIH
    $('body').on('click', '.editData', function () {
      let cart_id = $(this).data('id');

      //fetch data
      $.ajax({
        url: `transaksi-baru/show/${cart_id}`,
        type: "GET",
        cache: false,
        success:function(response){
          $('#addForm').attr('action', `transaksi-baru/update/${cart_id}`);
          $('#tambahProduk').html('<i class="fa fa-save"></i> Simpan');
          $('#id_produk').val(response.id_produk);
          $('#id_produk').select2().trigger('change');
          $('#nama_pesanan').val(response.nama_pesanan);
          $('#jumlah').val(response.jumlah);
          $('#satuan').val(response.satuan);
          $('#ukuran').val(response.ukuran);
          $('#ukuran_p').val(response.ukuran_p);
          $('#ukuran_l').val(response.ukuran_l);
          $('#addForm [name=is_plong]').val(response.is_plong);
          if ($('#checkPlong').val() == "yes") {
            $('#addForm [name=is_plong]').val(response.is_plong).prop('checked', true);
            $("#plongQty").removeAttr("disabled");
            $("#plongPrice").removeAttr("disabled");
          }else{
            $('#addForm [name=is_plong]').val(response.is_plong).prop('checked', false);
            $("#plongQty").attr("disabled", "disabled");
            $("#plongPrice").attr("disabled", "disabled");
          }
          $('#addForm [name=finishing_plong_qty]').val(response.finishing_plong_qty);
          $('#addForm [name=finishing_plong_harga]').val(response.finishing_plong_harga);
          $('#addForm [name=det_pesanan]').val(response.det_pesanan);
          $('#addForm [name=harga]').val(response.harga);
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

    //LOAD TOTAL 
    function loadForm(diskon = 0, diterima = 0, total = 0) {
      $('#total_item').val($('.total_item').text());

      $.get(`{{ url('transaksi-baru/loadform') }}/${diskon}/${total}/${diterima}`)
        .done(response => {
          $('#totalrp').text('Rp. '+ response.subtotal);
          $('#totalTagihan').val('Rp. '+ response.tot_tagih);
          $('#sisa').val('Rp. '+ response.kembalirp);

          $('#total_item').val(response.tot_item)
          $('#bayarTagihan').val(response.bayar_tagih);
          $('#kembali').val(response.kembalirp);
        })
        .fail(errors => {
          alert('Tidak dapat menampilkan data');
          return;
        })
    }
    //SET VALUE DISKON
    $(document).on('input', '#diskon', function(){
      if ($(this).val() == "") {
        $(this).val(0).select();
      }
      $('#diterima').val('0');

      loadForm($(this).val());
    });

    //SET VALUE KEMBALI
    $('#diterima').on('input', function(){
      if($(this).val() == ""){
         $(this).val(0).select();
      }
      loadForm($('#diskon').val(), $(this).val());
    })

    //GET VALUE KETIKA PRODUK DIPILIH
    $('#id_pelanggan').change(function() {
      var nama_pelanggan = $(this).find("option:selected").attr('nama');
      $('#nama').val(nama_pelanggan);
    });

    //OPSI PELANGGAN BARU
    $('#addCustomer').click(function() {
      var type = $('#customer_opsi').val();
      if (type == 'old') {
          $(this).html('<i class="fa fa-minus"></i>');
          $('#id_pelanggan').attr('disabled', 'true');
          $('#form-customer').show('fade');
          $('#customer_opsi').val('new');
          $('#nama').attr("disabled", "disabled");
          $('#nama_pelanggan').attr('required', 'true');
          $('#nama_pelanggan').removeAttr('disabled');
          $('#telepon_pelanggan').removeAttr('disabled');
          $('#alamat_pelanggan').removeAttr('disabled');
      } else {
          $(this).html('<i class="fa fa-plus"></i>');
          $('#nama').removeAttr('disabled');
          $('#id_pelanggan').removeAttr('disabled');
          $('#nama_pelanggan').removeAttr('required');
          $('#nama_pelanggan').attr("disabled", "disabled");
          $('#telepon_pelanggan').attr("disabled", "disabled");
          $('#alamat_pelanggan').attr("disabled", "disabled");
          $('#form-customer').hide('fade');
          $('#customer_opsi').val('old');
          $('#nama_customer').removeAttr('required');
      }
    })

    //Enable Jumlah bayar
    $("#opsi_pembayaran").change(function(){
      if($(this).val() == "piutang") {
        $('#diterima').prop('readonly', true)
      } else {
        $('#diterima').prop('readonly', false)
      }
    });
    
  </script>
@endsection
