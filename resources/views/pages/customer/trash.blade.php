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
                <a href="{{ url('data-pelanggan/restore/') }}" class="btn btn-info btn-sm btn_restore"><i class="fa fa-undo"> Restore All</i></a>
                <a href="{{ url('data-pelanggan/delete/') }}" class="btn btn-danger btn-sm btn_delete"><i class="fa fa-trash"> Delete All</i></a>
                <a href="{{ route('data-pelanggan.index') }}" class="btn btn-secondary btn-sm float-right">
                  <i class="fa fa-chevron-left"> Back</i>
                </a>
              </div>
            </div>          
            <div class="card-body pt-2">
              <form action="" class="pelanggan-trash">
                @csrf
                <table class="table table-head-fixed text-nowrap data-table" style="width: 100%">
                  <thead>
                    <tr>
                      <th style="width: 5%">
                        <input type="checkbox" name="selectAll" id="selectAll">
                      </th>
                      <th style="width: 5%">No</th>
                      <th>Toko</th>
                      <th>Alamat</th>
                      <th>Telepon</th>
                      <th>Aksi</th>
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
        ajax:"{{ route('data-pelanggan.trash') }}",
        columns:[
          {data:'DT_RowIndex', name:'DT_RowIndex'},
          {data:'nama_pelanggan', name:'nama_pelanggan'},
          {data:'alamat_pelanggan', name:'alamat_pelanggan'},
          {data:'telepon_pelanggan', name:'telepon_pelanggan'},
          {data:'action', name:'action'},
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

    //RESTORE ALL
    $('.btn_restore').click(function(e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
          title: 'Apakah kamu yakin?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, restore it!',
          showConfirmButton: true,
          timer: 3000
        }).then((result) => {
          if (result.isConfirmed) {
            document.location.href = href;
            Swal.fire(
              'Restored!',
              'Your file has been deleted.',
              'success',
            )
          }
        })
      });

      //DELETE ALL
      $('.btn_delete').click(function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        Swal.fire({
          title: 'Apakah kamu yakin?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!',
          showConfirmButton: true,
          timer: 3000
        }).then((result) => {
          if (result.isConfirmed) {
            document.location.href = href;
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success',
              
            )
          }
        })
      });
  </script>
@endsection


 