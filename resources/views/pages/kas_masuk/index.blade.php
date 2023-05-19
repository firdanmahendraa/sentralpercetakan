@extends('layouts.master')

@section('title', 'Laporan Kas Harian')

@push('css')
  <style>
    .va-mid{
      vertical-align: middle!important;
    }
  </style>

@section('content')
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      
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
                  @if ($kasmasuk == null)
                    <tr>
                      <td colspan="4">Tidak ada transaksi hari ini</td>
                    </tr>
                  @else
                    @foreach ($kasmasuk as $key => $item)
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
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  @include('pages.kas_masuk.form')
@endsection

@section('js')
  <script type="text/javascript">
    let table;
    //TAMPIL DATA
    $(function() {
      table = $('.kasmasukk').DataTable({
        processing: true,
        serverSide: true, 
        paging: false, 
        searching: false, 
        ordering: false, 
        "language": {
          "emptyTable": "Belum ada opsi pembayaran."
        },
        ajax:"{{ route('opsi-pembayaran.index') }}",
        columns:[
          {data:'DT_RowIndex', name:'DT_RowIndex'},
          {data:'opsi_pembayaran', name:'opsi_pembayaran'},
          {data:'nomor_rekening', name:'nomor_rekening'},
          {data:'atas_nama', name:'atas_nama'},
          {data:'action', name:'action'},
        ],
      });
      
      //VALIDATOR
      $('#modal-form').validator().on('submit',function(e){
        if (! e.preventDefault()) {
          $.ajax({
            url : $('#modal-form form').attr('action'),
            type: 'post',
            data: $('#modal-form form').serialize()
          })
          .done((response) => {
            $('#modal-form').modal('hide');
            Swal.fire({
              icon: 'success',
              title: response,
              showConfirmButton: true,
              timer: 3000
            })
            table.ajax.reload();
          })
          .fail((response) => {
            Swal.fire({
              icon: 'error',
              title: response.responseJSON.message,
              showConfirmButton: false,
            })
            return;
          });
        }
      })
    });

    //TAMBAH DATA
    function addForm(url){
      $('#modal-form').modal('show');
      $('#modal-heading').html("Tambah Opsi");

      $('#modal-form form')[0].reset();
      $('#modal-form form').attr('action', url);
      $('#modal-form [name=_method]').val('post');
    }

    //EDIT DATA
    $('body').on('click', '.editData', function () {
      let id = $(this).data('id');
      
      $('#modal-form').modal('show');
      $('#modal-heading').html("Edit Opsi Pembayaran");

      //fetch data
      $.ajax({
        url: `opsi-pembayaran/show/${id}`,
        type: "GET",
        cache: false,
        success:function(response){
          $('#FormModal').attr('action', `opsi-pembayaran/update/${id}`);
          $('#modal-form [name=opsi_pembayaran]').val(response.opsi_pembayaran);
          $('#modal-form [name=nomor_rekening]').val(response.nomor_rekening);
          $('#modal-form [name=atas_nama]').val(response.atas_nama);
        },
        error:function(response){
          alert('Tidak dapat menampilkan data');
          return;
        }
      });
    });

    //DELETE DATA
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
              showConfirmButton: true,
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


  </script>
@endsection