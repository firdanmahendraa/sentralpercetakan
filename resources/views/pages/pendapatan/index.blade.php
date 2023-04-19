@extends('layouts.master')

@section('title', 'Laporan Pendapatan')
@push('css')
<style>
  .va-mid{
    vertical-align: middle!important;
  }
</style>
@endpush

@section('content')
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline">       
            <div class="card-header">
              <div class="row">
                <div class="col-md-5">
                  <h5 class="mt-1"><i class="fas fa-list"></i> Daftar Transaksi</h5>
                </div>
                <div class="col-md-3 text-right text-bold mt-1">Pilih Periode : </div>
                <div class="col-4">
                  <div class="input-group">
                    <input type="text" class="form-control text-right" id="reservation" value="{{date('m/1/Y')}} - {{date('m/d/Y')}}">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>     
            <div class="card-body">
              <table class="table table-head-fixed text-nowrap data-table tablePendapatan" style="width: 100%" id="tabelMember">
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
            <div class="card-footer">
              <div class="text-right">
                <button class="btn btn-success"><i class="fas fa-file-excel"></i> Export Excel</button>
              </div>
            </div>
          </div>
            <!-- /.card -->
          </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  @include('pages.pendapatan.modal')
@endsection

@section('js')
  <script type="text/javascript">
    let table, tableDetail;
    //TAMPIL DATA
    
    $(function(){
      $('#reservation').daterangepicker({
        // locale: {
        //     format: 'DD/MM/YYYY'
        // }
      },
        function() {
          $('.tablePendapatan').DataTable().destroy();
          loadData();  
      })
      loadData();
    })

    function loadData() {
      table = $('.tablePendapatan').DataTable({
        processing: true, serverSide: true, ordering: false, info: false,
        ajax:{
          "url": "{{ route('pendapatan.data') }}",
          "data": {
            date :  $('.drp-selected').text()
          }
        },
        columnDefs: [
          {
            "targets": [0,2,3,4,5,6],
            "className": "dt-head-center"
          },{
            "targets": [3,4,5,6],
            "className": "dt-body-right"
          },{
            "targets": [0,6],
            "className": "dt-body-center"
          }
        ],
        columns:[
          {data:'updated_at', name:'updated_at'},
          {data:'no_nota', name:'no_nota'},
          {data:'nama_pelanggan', name:'nama_pelanggan'},
          {data:'total_harga', name:'total_harga'},
          {data:'diterima', name:'diterima'},
          {data:'diskon', name:'diskon'},
          {data:'piutang', name:'piutang'},
          {data:'opsi_pembayaran', name:'opsi_pembayaran'},
          {data:'action', name:'action'},
        ],
      });
    }

    function detail(id){
      $('#modalDetail').modal('show');
      loadDetail(id)
      $('#modalDetail').on('hidden.bs.modal', function () {
        $('.tableDetail').DataTable().destroy();
      })
    }

    function loadDetail(id){
      var tableDetail = $('.tableDetail').DataTable({
        processing: true, serverSide: true,  paging: false, searching: false, ordering: false, info: false,
        ajax:{
          "url": "{{ url('pendapatan/detail') }}/"+id
        },
        columnDefs: [
          {
            "targets": [0,1,2,3,4,5],
            "className": "dt-head-center"
          },{
            "targets": [0,2,3,4,5],
            "className": "va-mid"
          },{
            "targets": [3,4,5],
            "className": "dt-body-right"
          },{
            "targets": [0,2],
            "className": "dt-body-center"
          }
        ],
        columns:[
          {data:'DT_RowIndex', name:'DT_RowIndex'},
          {data:'nama_pesanan', name:'nama_pesanan'},
          {data:'ukuran', name:'ukuran'},
          {data:'harga', name:'harga'},
          {data:'jumlah', name:'jumlah'},
          {data:'sub_total', name:'sub_total'},
        ],
      });

    }



    

  </script>
@endsection