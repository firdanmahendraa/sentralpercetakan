@extends('layouts.master')

@section('title', 'Transaksi Pembelian')

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
</style>
@endpush

@section('content')
  <section class="content main-page">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">            
              <div class="card-body">
                <div class="mb-1">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama_pemesan" id="nama_pemesan">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Telepon</label>
                        <input type="text" class="form-control" name="alamat_pemesan" id="alamat_pemesan">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="telepon_pemesan" id="telepon_pemesan">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Acc Desain</label>
                        <input type="text" class="form-control" name="acc_desain" id="acc_desain">
                      </div>
                    </div>
                    <div class="col-md-3 offset-3 text-right">
                      <label for="" class="col-form-label" style="text-align:right">Cari Kode Produk</label>
                    </div>
                    <div class="col-md-6">
                      <form class="form-produk">
                        @csrf
                        <div class="input-group">
                          <input type="hidden" name="id_penjualan" id="id_penjualan" value="{{ $id_penjualan }}">
                          <input type="hidden" name="id_produk" id="id_produk">
                          <input type="text" class="form-control" name="kode_produk" id="kode_produk" disabled>
                          <span class="input-group-append">
                            <button type="button" class="btn btn-info btn-flat" onclick="tampilProduk()"><i class="fa fa-plus"></i></button>
                          </span>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>

                <table class="table table-head-fixed text-nowrap data-table" style="width: 100%" id="tableDetail">
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th>Kode</th>
                      <th>Nama</th>
                      <th>Harga</th>
                      <th width="8%">Jumlah</th>
                      <th width="8%">Satuan</th>
                      <th>Subtotal</th>
                      <th><i class="fa fa-cog"></i></th>
                    </tr>
                  </thead>
                  <tbody> </tbody>
                </table>

                <div class="row">
                  <div class="col-lg-8">
                    <div class="tampil-bayar bg-info"></div>
                  </div>
                  <div class="col-lg-4">
                    <form action="{{ route('transaksi.store') }}" class="form-penjualan" method="post">
                      @csrf
                      <input type="hidden" name="id_penjualan" value="{{ $id_penjualan }}">
                      <input type="hidden" name="total" id="total">
                      <input type="hidden" name="total_item" id="total_item">
                      <input type="hidden" name="bayar" id="bayar">

                      <div class="form-group row">
                        <label for="total" class="col-lg-3 text-right mt-2">Total</label>
                        <div class="col-lg-9">
                          <input type="text" id="totalrp" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="diskon" class="col-lg-3 text-right mt-2">Diskon</label>
                        <div class="col-lg-9">
                          <div class="input-group">
                            <input type="number" name="diskon" id="diskon" class="form-control diskon" value="0">
                            <div class="input-group-prepend">
                              <span class="input-group-text">%</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="bayar" class="col-lg-3 text-right mt-2">Bayar</label>
                        <div class="col-lg-9">
                          <input type="text" id="bayarrp" class="form-control" disabled>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="bayar" class="col-lg-3 text-right mt-2">Diterima</label>
                        <div class="col-lg-9">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Rp</span>
                            </div>
                            <input type="number" id="diterima" name="diterima" class="form-control" value="0">
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="sisa" class="col-lg-3 text-right mt-2">Sisa</label>
                        <div class="col-lg-9">
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Rp</span>
                            </div>
                            <input type="text" name="sisa" class="form-control" disabled>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button class="btn btn-info btn-sm float-right btn-simpan"><i class="fa fa-floppy-o"> Simpan Transaksi</i></button>
              </div>
            </div>
            <!-- /.card -->
          </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  @include('pages.penjualan_detail.produk') 
@endsection

@section('js')
  <script type="text/javascript">
    $(document).ready(function() {
        // $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
        // $('.select').select2({
        //   tags:true,
        //   tokenSeparators: [',','']
        // });

        // $.('#myTab a[href="#karyawan"]').on('click', function (e) {
        //   e.preventDefault()
        //   $(this).tab('show')
        // })
    });

    let table, table2, table3;
    $(function(){
      // TABEL DETAIL PENJUALAN
      table = $('#tableDetail').DataTable({
        processing: true, severSide: true,  paging: false, searching: false, ordering: false, info: false,
        ajax:"{{ route('transaksi-detail.data', $id_penjualan) }}",
        columns:[
          {data:'DT_RowIndex', name:'DT_RowIndex'},
          {data:'kode_produk', name:'kode_produk'},
          {data:'nama_produk', name:'nama_produk'},
          {data:'harga', name:'harga'},
          {data:'jumlah', name:'jumlah'},
          {data:'satuan_produk', name:'satuan_produk'},
          {data:'sub_total', name:'sub_total'},
          {data:'action', name:'action', orderable: false, searchable: false},
        ],
      })
      .on('draw.dt', function(){
        loadForm($('#diskon').val());
      });

      // TABEL MODAL PRODUK
      table2 = $('#tableProduk').DataTable({ paging: false, ordering: false, info: false })

      // FORM EDIT TOTAL ITEM
      $(document).on('input', '.jumlah', function(){
        let id = $(this).data('id');
        let jumlah = $(this).val();

        if (jumlah < 1) {
          $(this).val(1);
          Swal.fire({
              icon: 'error',
              title: 'Jumlah tidak boleh kurang dari 1',
            }) 
          return;
        }

        $.post(`{{ url('transaksi-detail') }}/${id}`, {
          '_token': $('[name=csrf-token]').attr('content'),
          '_method': 'put',
          'jumlah': jumlah
        })
        .done(response => {
          $(this).on('mouseout', function(){
            table.ajax.reload();
          });
        })
        .fail(errors => {
          alert('Tidak dapat menyimpan data');
          return;
        });
      });

      // UBAH VALUE DISKON
      $(document).on('input', '#diskon', function(){
        if ($(this).val() == "") {
          $(this).val(0).select();
        }

        loadForm($(this).val());
      });

      // INPUT DITERIMA
      $('#diterima').on('input', function () {
        if ($(this).val() == "") {
          $(this).val(0).select();
        }

        loadForm($('$diskon').val(), $(this).val());
      }).focus(function () {
          $(this).select();
      });

      // SIMPAN TRANSAKSI
      $('.btn-simpan').on('click', function () {
        $(".form-penjualan").submit();
      });
    });

    // SHOW MODAL PRODUK
    function tampilProduk() {
      $('#modal-produk').modal('show');
    }
    // FUNGSI PILIH PRODUK BUTTON
    function pilihProduk(id, kode) {
      $('#id_produk').val(id);
      $('#kode_produk').val(kode);
      $('#modal-produk').modal('hide');
      tambahProduk();
    }

    // PROSES PILIH PRODUK
    function tambahProduk() {
      $.post('{{ route('transaksi-detail.store') }}', $('.form-produk').serialize())
      .done(response => {
        $('#kode_produk').focus();
        table.ajax.reload();
      })
      .fail(errors => {
        alert('Tidak dapat menyimpan data');
        return;
      })
    }

    // JAPUS PRODUK TERPILIH
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
              showConfirmButton: false,
              timer: 1500
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
    
    // LOAD TOTAL 
    function loadForm(diskon = 0, diterima = 10) {
      $('#total').val($('.total').text());
      $('#total_item').val($('.total_item').text());

      $.get(`{{ url('transaksi-detail/loadform') }}/${diskon}/${$('.total').text()}/${diterima}`)
        .done(response => {
          $('#totalrp').val('Rp. '+ response.totalrp);
          $('#bayarrp').val('Rp. '+ response.bayarrp);
          $('#bayar').val(response.bayar);
          $('.tampil-bayar').text('Rp. '+ response.bayarrp);
        })
        .fail(errors => {
          alert('Tidak dapat menampilkan data');
          return;
        })
    }


  </script>
@endsection
