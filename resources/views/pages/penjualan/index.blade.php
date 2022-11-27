@extends('layouts.master')

@section('title', 'Transaksi Baru')

@section('content')
  <section class="content main-page">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">            
              <div class="card-body">
                <div class="mb-4 justify-content-between">
                  <a href="{{ route('transaksi.create') }}" class="btn btn-success btn-sm">Tambah Transaksi</a>
                </div>
                <table class="table table-head-fixed text-nowrap data-table tableOwner" style="width: 100%" id="tabelMember">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>No. Nota</th>
                      <th>Nama</th>
                      <th>Total Jumlah</th>
                      <th>Diskon</th>
                      <th>Terima</th>
                      <th><i class="fa fa-cog"></i></th>
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
  {{-- @include('pages.piutang-karyawan.form-modal')  --}}
@endsection
@section('js')
  <script type="text/javascript">
    let table;
    //TAMPIL DATA
    $(function(){
      table = $('.table').DataTable({
        processing: true,
        severSide: true,
        ajax:"{{ route('transaksi.index') }}",
        columns:[
          {data:'created_at', name:'selectAll'},
          {data:'nama_pemesan', name:'kode_member'},
          {data:'total_harga', name:'nama_member'},
          {data:'diskon', name:'alamat_member'},
          {data:'bayar', name:'telepon_member'},
          {data:'action', name:'action'},
        ],
      });

    });


  </script>
@endsection
