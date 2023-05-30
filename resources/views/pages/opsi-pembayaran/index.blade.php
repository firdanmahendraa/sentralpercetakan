@extends('layouts.master')

@section('title', 'Opsi Pembayaran')

@section('content')
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">            
              <div class="card-body">
                <div class="mb-2 ">
                  <button class="btn btn-primary btn-sm" onclick="addForm('{{ route('opsi-pembayaran.store') }}')">
                    <i class="fa fa-plus"> Tambah Opsi</i>
                  </button>
                </div>
                <table class="table table-head-fixed text-nowrap data-table" style="width: 100%">
                  <thead>
                    <tr>
                      <th style="width: 5%">No</th>
                      <th>Opsi Pembayaran</th>
                      <th>Nomor Rekening</th>
                      <th>Atas Nama</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody> </tbody>
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
  @include('pages.opsi-pembayaran.form-modal') 
@endsection

@section('js')
  <script type="text/javascript">
    let table;
    //TAMPIL DATA
    $(function() {
      table = $('.table').DataTable({
        processing: true,
        serverSide: true,
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