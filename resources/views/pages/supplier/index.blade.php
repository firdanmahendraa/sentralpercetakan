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
                  <a href="javascript:void(0)" class="btn btn-primary btn-sm" id="tambahSupplier">
                    <i class="fa fa-plus"> Tambah Supplier</i>
                  </a>
                </div>
                <table class="table table-head-fixed text-nowrap data-table" style="width: 100%" id="tabelSupplier">
                  <thead>
                    <tr>
                      <th style="width: 5%">No</th>
                      <th>Nama</th>
                      <th>Suppliername</th>
                      <th>Password</th>
                      <th>Level</th>
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
    $(document).ready(function(){
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });   

    // TAMPIL DATA 
    var table = $('#tabelSupplier').DataTable({
          processing: true,
          severSide: true,
          ajax:"{{ route('users.index') }}",
            columns:[
              {data:'DT_RowIndex', name:'DT_RowIndex'},
              {data:'name', name:'name'},
              {data:'username', name:'username'},
              {data:'password', name:'password'},
              {data:'levels', name:'levels'},
              {data:'action', name:'action'},
            ],
        });

      // TAMBAH DATA
      $("#tambahSupplier").click(function(){
        $('#id').val('');
        $('#addForm').trigger('reset');
        $('#modal-heading').html("Tambah Supplier");
        $('#modalSupplier').modal('show');
      });
      $("#saveBtn").click(function(e){
        e.preventDefault();
        $(this).html('Save');

        $.ajax({
          data:$("#addForm").serialize(),
          url:"{{ route('users.store') }}",
          type:"POST",
          dataType:'json',
          success:function(data){
            $('#addForm').trigger('reset');
            $('#modalSupplier').modal('hide');
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Supplier berhasil disimpan',
              showConfirmButton: false,
              timer: 1500
            }) 
            table.ajax.reload();
          },
          error:function(data){
            console.log('Error:',data);
          }
        });
      });

      //GET EDIT DATA
      $('body').on('click', '.editSupplier', function(){
        var id = $(this).data('id');
        $.get("{{ route('users.index') }}"+"/"+id+"/edit", function(data){
          $('#modal-heading').html("Edit Supplier");
          $('#modalSupplier').modal('show');
          $('#id').val(data.id);
          $('#kode_kanametegori').val(data.name);
          $('#username').val(data.username);
          $('#password').val(data.password);
          $('#levels').val(data.levels);
        });
      });
      
      //DELETE DATA
      $('body').on('click', '.deleteSupplier', function(){
        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
          },
          buttonsStyling: false
        })
        var id = $(this).data("id");
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              type:"DELETE",
              url:"{{ route('users.store') }}"+'/'+id,
              success:function(data){
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
                table.ajax.reload();
              }
            });
          }else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire(
              'Cancelled',
              'Your imaginary file is safe :)',
              'error'
            )
          }
       }) 
      });

    });
  </script>
@endsection