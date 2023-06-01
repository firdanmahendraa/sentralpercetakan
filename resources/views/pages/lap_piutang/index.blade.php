@extends('layouts.master')

@section('title', 'Piutang Usaha')

@section('content')
  <section class="content main-page">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        @if (session('success'))
        <div class="col-lg-12">
          <div class="alert alert-primary">{{ session('success') }}</div>
        </div>
        @endif
        <div class="col-12">
            <div class="card card-primary card-outline">       
              <div class="card-header">
                <div class="row">
                  <div class="col-md-6">
                    <h5 class="mt-1"><i class="fas fa-list"></i> Daftar Transaksi</h5>
                  </div>
                  <div class="col-md-6">
                    <div class="text-right">
                      <a href="{{ route('transaksi-baru.index') }}" class="btn btn-sm btn-success">Tambah Transaksi</a>
                    </div>
                  </div>
                </div>
              </div>     
              <div class="card-body">
                <table class="table table-head-fixed text-nowrap data-table tablePenjualan" style="width: 100%">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>No. Nota</th>
                      <th>Nama</th>
                      <th>Tot. Jumlah</th>
                      <th>Uang Muka</th>
                      <th>Diskon</th>
                      <th>Piutang</th>
                      <th width="10%">Keterangan</th>
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
@endsection
@section('js')
  <script type="text/javascript">
    let table;
    //TAMPIL DATA
    $(function(){
      table = $('.tablePenjualan').DataTable({
        processing: true, serverSide: true, info: false,
        ajax: "{{ route('laporan_piutang.index') }}",
        "language": {
          "emptyTable": "Semua transaksi LUNAS"
        },
        columnDefs: [
          {
            "targets": [0,2,3,4,5,6,7,8],
            "className": "dt-head-center"
          },{
            "targets": [3,4,5,6],
            "className": "dt-body-right"
          },{
            "targets": [0,6,7,8],
            "className": "dt-body-center"
          }
        ],
        columns:[
          {data:'created_at', name:'created_at'},
          {data:'no_nota', name:'no_nota'},
          {data:'nama_pelanggan', name:'nama_pelanggan'},
          {data:'total_harga', name:'total_harga'},
          {data:'diterima', name:'diterima'},
          {data:'diskon', name:'diskon'},
          {data:'piutang', name:'piutang'},
          {data:'keterangan', name:'keterangan'},
          {data:'action', name:'action', orderable: false, searchable: false},
        ],
      });
    });

    function cetakInvoice(url, title) {
      popupCenter(url, title, 720, 675)
    }

    function popupCenter(url, title, w, h){
      const dualScreenLeft = window.screenLeft !==  undefined ? window.screenLeft : window.screenX;
      const dualScreenTop  = window.screenTop  !==  undefined ? window.screenTop  : window.screenY;

      const width  = window.innerWidth  ? window.innerWidth  : document.documentElement.clientWidth  ? document.documentElement.clientWidth  : screen.width;
      const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

      const systemZoom = width / window.screen.availWidth;
      const left       = (width - w) / 2 / systemZoom + dualScreenLeft
      const top        = (height - h) / 2 / systemZoom + dualScreenTop
      const newWindow  = window.open(url, title, 
        `
          scrollbars=yes,
          width  = ${w / systemZoom}, 
          height = ${h / systemZoom}, 
          top    = ${top}, 
          left   = ${left}
        `
      );

      if (window.focus) newWindow.focus();
  }

  </script>
@endsection
