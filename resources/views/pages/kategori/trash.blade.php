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
              <div class="mb-2 ">
                <a href="{{ route('data-kategori.restore') }}" class="btn btn-info btn-sm">
                  <i class="fa fa-undo"> Restore All</i>
                </a>
                <a href="{{ route('data-kategori.delete') }}" class="btn btn-danger btn-sm">
                  <i class="fa fa-undo"> Delete All</i>
                </a>
                <a href="{{ route('data-kategori.index') }}" class="btn btn-secondary btn-sm float-right">
                  <i class="fa fa-chevron-left"> Back</i>
                </a>
              </div>
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
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $ctg->kode_kategori }}</td>
                      <td>{{ $ctg->nama_kategori }}</td>
                      <td>
                        <a href="{{ url('data-kategori/restore/'.$ctg->id) }}" class="btn btn-info btn-sm mr-1" onclick="restore('handleDismiss')">
                          <i class="fa fa-undo"> Restore</i>
                        </a>
                        <a href="{{ url('data-kategori/delete/'.$ctg->id) }}" class="btn btn-danger btn-sm">
                          <i class="fa fa-undo"> Delete Permanently</i>
                        </a>
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

