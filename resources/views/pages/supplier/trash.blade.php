@extends('layouts.master')

@section('title', 'Data Supplier Terhapus')

@section('content')
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline">  
            <div class="card-head">
              <div class="px-3 pt-2">
                <a href="{{ url('data-supplier/restore/') }}" class="btn btn-info btn-sm btn_restore disabled" id="restoreAllSelectedRecord"><i class="fa fa-undo"> Restore Selected</i></a>
                <a href="{{ url('data-supplier/delete/') }}" class="btn btn-danger btn-sm btn_delete disabled" id="deleteAllSelectedRecord"><i class="fa fa-trash"> Delete Selected</i></a>
                <a href="{{ route('data-supplier.index') }}" class="btn btn-secondary btn-sm float-right">
                  <i class="fa fa-chevron-left"> Back</i>
                </a>
              </div>
            </div>          
            <div class="card-body pt-2">
              <form action="" class="supplier-trash">
                @csrf
                <table class="table table-head-fixed text-nowrap data-table" style="width: 100%">
                  <thead>
                    <tr>
                      <th style="width: 5%">
                        <input type="checkbox" name="selectAll" id="select_all_ids">
                      </th>
                      <th>Toko</th>
                      <th>Alamat</th>
                      <th>Telepon</th>
                      <th>Detail</th>
                    </tr>
                  </thead>
                  <tbody> </tbody>
                </table>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('js')
  <script>
    let table;
    //TAMPIL DATA
    $(function() {
      table = $('.table').DataTable({
        processing: true,
        severSide: true,
        ajax:"{{ route('data-supplier.trash') }}",
        columns:[
          {data:'selectAll', name:'selectAll'},
          {data:'nama_supplier', name:'nama_supplier'},
          {data:'alamat_supplier', name:'alamat_supplier'},
          {data:'telepon_supplier', name:'telepon_supplier'},
          {data:'deleted_at', name:'deleted_at'},
        ],
      });

      //selectAll
      $('[name=selectAll]').on('click', function(){
        $(':checkbox').prop('checked', this.checked);
        togglebtnAll()
      });
      $(document).on('change', '#selectOne', function(){
        if ( $('input[name="id[]"]').length == $('input[name="id[]"]:checked').length) {
          $('input[name="selectAll"]').prop('checked', true);
        }else{
          $('input[name="selectAll"]').prop('checked', false);
        }
        togglebtnAll()
      })
      //SHOW HIDE BUTTON ALL
      function togglebtnAll(){
        if ( $('input[name="id[]"]:checked').length > 1) {
          $('button#btnAll').removeClass('d-none');
        }else{
          $('button#btnAll').addClass('d-none');
        }
      }
    });

    $(function(e){
      // Sellect all checkbox
      $('[name=selectAll]').on('click', function () {
        $(':checkbox').prop('checked', this.checked);
        $('#restoreAllSelectedRecord').html('<i class="fa fa-undo"> Restore All</i>');
        $('#deleteAllSelectedRecord').html('<i class="fa fa-trash"> Delete All</i>');
        togglebtnAll();
      });
      $(document).on('change', '.selectOne', function(){
        if ( $('input[name="ids"]').length == $('input[name="ids"]:checked').length) {
          $('input[name="selectAll"]').prop('checked', true);
          $('#restoreAllSelectedRecord').html('<i class="fa fa-undo"> Restore All</i>');
          $('#deleteAllSelectedRecord').html('<i class="fa fa-trash"> Delete All</i>');
        }else{
          $('input[name="selectAll"]').prop('checked', false);
          $('#restoreAllSelectedRecord').html('<i class="fa fa-undo"> Restore Selected</i>');
          $('#deleteAllSelectedRecord').html('<i class="fa fa-trash"> Delete Selected</i>');
        }
        togglebtnAll();
      })
      function togglebtnAll(){
        if ( $('input[name="ids"]:checked').length >= 1) {
          $('#restoreAllSelectedRecord').removeClass("disabled");
          $('#deleteAllSelectedRecord').removeClass("disabled");
        }else{
          $('#restoreAllSelectedRecord').addClass("disabled");
          $('#deleteAllSelectedRecord').addClass("disabled");
          $('#restoreAllSelectedRecord').html('<i class="fa fa-undo"> Restore Selected</i>');
          $('#deleteAllSelectedRecord').html('<i class="fa fa-trash"> Delete Selected</i>');
        }
      }

      // Detele selected
      $('#deleteAllSelectedRecord').click(function(e){
        e.preventDefault();
        var all_ids = [];
        $('input:checkbox[name=ids]:checked').each(function(){
          all_ids.push($(this).val());
        });
        Swal.fire({
          title: 'Apakah kamu yakin?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: "{{ route('data-supplier.delete') }}",
              type: "DELETE",
              data:{
                ids:all_ids,
                _token: '{{ csrf_token() }}'
              },
              success:function(response){
                $.each(all_ids, function(key,val){
                  $('#checkbox_ids'+val).remove();
                })
                Swal.fire({
                  icon: 'success',
                  title: 'Data berhasil dihapus!',
                  showConfirmButton: true,
                  timer: 1500
                }) 
                $('input[name="selectAll"]').prop('checked', false);
                $('#restoreAllSelectedRecord').addClass("disabled");
                $('#deleteAllSelectedRecord').addClass("disabled");
                $('#restoreAllSelectedRecord').html('<i class="fa fa-undo"> Restore Selected</i>');
                $('#deleteAllSelectedRecord').html('<i class="fa fa-trash"> Delete Selected</i>');
                table.ajax.reload();
              },
              error:function(jqXHR, textStatus,errorThrown){
                Swal.fire({
                  icon: 'error',
                  title:  errorThrown,
                  showConfirmButton: true,
                })
                return;
              }
            });
          }
        })

      });
      
      // Restore selected
      $('#restoreAllSelectedRecord').click(function(e){
        e.preventDefault();
        var all_ids = [];
        $('input:checkbox[name=ids]:checked').each(function(){
          all_ids.push($(this).val());
        });
        Swal.fire({
          title: 'Apakah kamu yakin?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, restore it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: "{{ route('data-supplier.restore') }}",
              data:{
                ids:all_ids,
                _token: '{{ csrf_token() }}'
              },
              success:function(response){
                Swal.fire({
                  icon: 'success',
                  title: 'Data berhasil direstore!',
                  showConfirmButton: true,
                  timer: 1500
                }) 
                $('input[name="selectAll"]').prop('checked', false);
                $('#restoreAllSelectedRecord').addClass("disabled");
                $('#deleteAllSelectedRecord').addClass("disabled");
                $('#restoreAllSelectedRecord').html('<i class="fa fa-undo"> Restore Selected</i>');
                $('#deleteAllSelectedRecord').html('<i class="fa fa-trash"> Delete Selected</i>');
                table.ajax.reload();
              },
              error:function(jqXHR, textStatus,errorThrown){
                Swal.fire({
                  icon: 'error',
                  title:  errorThrown,
                  showConfirmButton: true,
                })
                return;
              }
            });
          }
        })

      });
    });
 
  </script>
@endsection


 