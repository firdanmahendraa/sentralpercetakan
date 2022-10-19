@extends('layouts.master')

@section('title', 'Data Kategori Terhapus')

@section('content')
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
          @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
          @endif
          <div class="card card-primary card-outline">            
            <div class="card-body">
              <a href="{{ url('data-kategori/restore/') }}" class="btn btn-info btn-sm btn-aksi-restore"><i class="fa fa-undo"> Restore All</i></a>
              <a href="{{ url('data-kategori/delete/') }}" class="btn btn-danger btn-sm btn-aksi-delete"><i class="fa fa-trash"> Delete All</i></a>
              <a href="{{ route('data-kategori.index') }}" class="btn btn-secondary btn-sm float-right mb-2">
                <i class="fa fa-chevron-left"> Back</i>
              </a>
              <table class="table table-head-fixed text-nowrap data-table" style="width: 100%">
                <thead>
                  <tr>
                    <th style="width: 5%">No</th>
                    <th>Kode</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($category as $ctg)
                    <tr>
                      <td>{{ $loop->iteration}}</td>
                      <td>{{ $ctg->kode_kategori }}</td>
                      <td>{{ $ctg->nama_kategori }}</td>
                      <td>
                        <a href="{{ url('data-kategori/restore/'.$ctg->id) }}" class="btn btn-info btn-sm btn-aksi-restore">Restore Permanently</a>
                        <a href="{{ url('data-kategori/delete/'.$ctg->id) }}" class="btn btn-danger btn-sm btn-aksi-delete">Delete Permanantly</a>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="5" class="text-center" style="font-weight: bold; background-color:rgb(236, 236, 236)">Data Kosong</td>
                    </tr>
                  @endforelse
                </tbody>
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
@endsection

@section('js')
  <script>
      //RESTORE ONE
      $('.btn-aksi-restore').click(function(e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
          title: 'Apakah kamu yakin?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, restore it!'
        }).then((result) => {
          if (result.isConfirmed) {
            document.location.href = href;
            Swal.fire(
              'Restored!',
              'Your file has been deleted.',
              'success'
            )
          }
        })
      });

      //DELETE ONE
      $('.btn-aksi-delete').click(function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        Swal.fire({
          title: 'Apakah kamu yakin?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            document.location.href = href;
            Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
            )
          }
        })
      });

      //RESTORE MANY
      $(document).on('click', '#btnRestoreAll', function(e){
        e.preventDefault();
        const href = $(this).attr('href');
        var checkedKategori = [];
        $('input[name="kategori_checkbox"]:checked').each(function(){
          checkedKategori.push($(this).val());
        });
        var url = "{{ url('data-kategori/restore') }}";
        if(checkedKategori.length > 1){
          Swal.fire({
          title: 'Apakah kamu yakin?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, restore it!'
        }).then((result) => {
          if (result.isConfirmed) {
            document.location.href = href;
            Swal.fire(
              'Restored!',
              'Your file has been deleted.',
              'success'
            )
          }
        })
        }
      })
  </script>
@endsection


 