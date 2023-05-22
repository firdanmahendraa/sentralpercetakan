@extends('layouts.master')

@section('title', 'Hutang Usaha')

@push('css')
  <style>
    span.select2-container{
      z-index:10050;
    }
    #DataTables_Table_1{
      margin-top: 0!important;
    }
    .va-mid{
      vertical-align: middle!important;
    }
  </style>

@section('content')
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        @if (session('success'))
        <div class="col-lg-12">
          <div class="alert alert-primary">{{ session('success') }}</div>
        </div>
        @endif
        <div class="col-lg-12">
          <div class="card card-primary card-outline">       
            <div class="card-header">
              <div class="row">
                <div class="col-md-6">
                  <h5 class="mt-1"><i class="fas fa-list mr-1"></i>Daftar Transaksi</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <table class="table tbPembelian" width="100%">
                <thead>
                  <tr>
                    <th class="text-center">TANGGAL</th>
                    <th class="text-center">NAMA SUPPLIER</th>
                    <th class="text-center">NO NOTA</th>
                    <th class="text-center">TOTAL</th>
                    <th class="text-center">BAYAR</th>
                    <th class="text-center">Hutang</th>
                    <th class="text-center">Keterangan</th>
                    <th class="text-center"><i class="fa fa-cog"></i></th>
                  </tr>
                </thead>
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
  @include('pages.pembelian.detail')
@endsection

@section('js')
  <script type="text/javascript">
    let table, tableDetail;
    $(function(){
      //TABEL PEMBELIAN
      table = $('.tbPembelian').DataTable({
        processing: true, 
        serverSide: true, 
        info: false,
        ajax:"{{ route('laporan_hutang.index') }}",
        "language": {
          "emptyTable": "Tidak ada Hutang"
        },
        columnDefs: [
          {
            "targets": [3,4,5],
            "className": "dt-body-right"
          },{
            "targets": [0,2,6],
            "className": "dt-body-center"
          }
        ],
        columns:[
          {data:'created_at', name:'created_at'},
          {data:'nama_supplier', name:'nama_supplier'},
          {data:'no_nota', name:'no_nota'},
          {data:'sub_total', name:'sub_total'},
          {data:'bayar', name:'bayar'},
          {data:'hutang', name:'hutang'},
          {data:'keterangan', name:'keterangan'},
          {data:'action', name:'action', orderable: false, searchable: false},
        ],
      })
    });

    //TABEL PEMBELIAN DETAIL
    function detailPembelian(id){
      $('#form_detail').modal('show');
      $('#heading').html("Detail Pembelian");
      loadDetail(id)
      $('#form_detail').on('hidden.bs.modal', function () {
        $('.tbDetail').DataTable().destroy();
      })
    }
    function loadDetail(id){
      var tableDetail = $('.tbDetail').DataTable({
        processing: true, serverSide: true,  paging: false, searching: false, ordering: false, info: false,
        ajax:{
          "url": "{{ url('transaksi-pembelian/detail') }}/"+id
        },
        columns:[
          {data:'id_akun', name:'id_akun'},
          {data:'uraian', name:'uraian'},
          {data:'jumlah', name:'jumlah'},
          {data:'harga', name:'harga'},
          {data:'sub_total', name:'sub_total'},
        ],
      });
    }

  </script>
@endsection