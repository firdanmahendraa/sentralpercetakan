@extends('layouts.master')

@section('title', 'Kode Akun')

@section('content')
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">            
              <div class="card-body">
                <div class="mb-2 ">
                  <button class="btn btn-primary btn-sm" onclick="addForm('{{ route('data-akun.store') }}')">
                    <i class="fa fa-plus"> Tambah Kode Akun</i>
                  </button>
                  <a href="{{ route('data-akun.trash') }}" class="btn btn-danger btn-sm float-right">
                    <i class="fa fa-trash"> Trash</i>
                  </a>
                </div>
                <table class="table table-head-fixed text-nowrap data-table" style="width: 100%" id="tabelKategori">
                  <thead>
                    <tr>
                      <th style="width: 5%">No</th>
                      <th>Kode</th>
                      <th>Keterangan</th>
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
  @include('pages.kode-akun.form-modal') 
@endsection

@section('js')
  <script type="text/javascript">
    let table;
    // TAMPIL DATA 
    $(function(){
    table = $('.table').DataTable({
        processing: true,
        serverSide: true,
        ajax:"{{ route('data-akun.index') }}",
          columns:[
            {data:'DT_RowIndex', name:'DT_RowIndex'},
            {data:'id', name:'id'},
            {data:'nama_akun', name:'nama_akun'},
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
              timer: 1500
            })
            table.ajax.reload();
          })
          .fail((response) => {
            Swal.fire({
              icon: 'error',
              title:  response.responseJSON.message,
              showConfirmButton: true,
            })
            return;
          });
        }
      })
    });

    // TAMBAH DATA
    function addForm(url){
      $('#modal-form').modal('show');
      $('#modal-heading').html("Tambah Kode Akun");

      $('#modal-form form')[0].reset();
      $('#modal-form form').attr('action', url);
      $('#modal-form [name=_method]').val('post');
      $('#modal-form [name=nama_kategori]').focus();
    }

    //EDIT DATA
    $('body').on('click', '.editData', function () {
      let id = $(this).data('id');
      
      $('#modal-form').modal('show');
      $('#modal-heading').html("Edit Kode Akun");

      //fetch data
      $.ajax({
        url: `data-akun/show/${id}`,
        type: "GET",
        cache: false,
        success:function(response){
          $('#FormModal').attr('action', `data-akun/update/${id}`);
          $('#modal-form [name=id]').val(response.id);
          $('#modal-form [name=nama_akun]').val(response.nama_akun);
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