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
                <div class="row mb-2">
                  <div class="col-sm-4">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                        <input type="text" class="form-control float-right" id="reservation">
                    </div>
                  </div>
                  <div class="col-sm-6 offset-2 text-right">
                    <a href="{{ route('transaksi-penjualan.create') }}" class="btn btn-success btn-sm">Transaksi Baru</a>
                  </div>
                </div>
                <table class="table table-head-fixed text-nowrap data-table tableOwner" style="width: 100%" id="tabelMember">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>No. Nota</th>
                      <th>Nama</th>
                      <th>Tot. Jumlah</th>
                      <th>Diskon</th>
                      <th>Tot. Diterima</th>
                      <th>Kembali</th>
                      <th>Status Pembayaran</th>
                      <th width="10%"><i class="fa fa-cog"></i></th>
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
      $('#reservation').daterangepicker({
        
      })

      table = $('.table').DataTable({
        processing: true,severSide: true, ordering: false,
        ajax:"{{ route('transaksi-penjualan.index') }}",
        "language": {
          "emptyTable": "Belum ada transaksi hari ini"
        },
        columns:[
          {data:'created_at', name:'selectAll'},
          {data:'no_nota', name:'no_nota'},
          {data:'id_pelanggan', name:'id_pelanggan'},
          {data:'total_harga', name:'total_harga'},
          {data:'diskon', name:'diskon'},
          {data:'diterima', name:'diterima'},
          {data:'kembali', name:'kembali'},
          {data:'id_pembayaran', name:'id_pembayaran'},
          {data:'action', name:'action'},
        ],
      });

    });


  </script>
@endsection
