@extends('layouts.master')

@section('title', 'Data Supplier')

@section('content')
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">            
              <div class="card-body">
                <div class="mb-2 ">
                  <button class="btn btn-primary btn-sm" onclick="addForm('{{ route('data-supplier.store') }}')">
                    <i class="fa fa-plus"> Tambah Supplier</i>
                  </button>
                  <a href="{{ route('data-supplier.trash') }}" class="btn btn-danger btn-sm float-right">
                    <i class="fa fa-trash"> Trash</i>
                  </a>
                </div>
                <table class="table table-head-fixed text-nowrap data-table" style="width: 100%">
                  <thead>
                    <tr>
                      <th style="width: 5%">No</th>
                      <th>Toko</th>
                      <th>Alamat</th>
                      <th>Telepon</th>
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
  @include('pages.supplier.form-modal') 
@endsection

@section('js')
  <script type="text/javascript">
    let table;
    //TAMPIL DATA
    $(function() {
      table = $('.table').DataTable({
        processing: true,
        severSide: true,
        ajax:"{{ route('data-supplier.index') }}",
        columns:[
          {data:'DT_RowIndex', name:'DT_RowIndex'},
          {data:'nama_supplier', name:'nama_supplier'},
          {data:'alamat_supplier', name:'alamat_supplier'},
          {data:'telepon_supplier', name:'telepon_supplier'},
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
              title: 'Data berhasil disimpan',
              showConfirmButton: true,
              timer: 3000
            })
            table.ajax.reload();
          })
          .fail((errors) => {
            Swal.fire({
              icon: 'error',
              title: 'Data gagal disimpan!',
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
      $('#modal-heading').html("Tambah Supplier");

      $('#modal-form form')[0].reset();
      $('#modal-form form').attr('action', url);
      $('#modal-form [name=_method]').val('post');
      $('#modal-form [name=nama_supplier]').focus();
    }

    //EDIT DATA
    function editForm(url){
      $('#modal-form').modal('show');
      $('#modal-heading').html("Edit Supplier");

      $('#modal-form form')[0].reset();
      $('#modal-form form').attr('action', url);
      $('#modal-form [name=_method]').val('put');
      $('#modal-form [name=nama_supplier]').focus();

      $.get(url)
        .done((response) => {
          $('#modal-form [name=nama_supplier]').val(response.nama_supplier);
          $('#modal-form [name=alamat_supplier]').val(response.alamat_supplier);
          $('#modal-form [name=telepon_supplier]').val(response.telepon_supplier);
        })
        .fail((errors) => {
          alert('Tidak dapat menampilkan data');
          return;
        });
    }

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
              timer: 3000
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