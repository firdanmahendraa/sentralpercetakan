@extends('layouts.master')

@section('title', 'Riwayat Transaksi Penjualan')

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
                  <div class="col-md-8"><a href="{{ route('transaksi-baru.index') }}" class="btn btn-sm btn-success">Tambah Transaksi</a>
                  </div>
                  <div class="col-md-4">
                    <div class="input-group">
                      <label class="mt-1 mr-2">Pilih Periode : </label>
                      <input type="text" class="form-control text-right" id="reservation" value="{{date('m/1/Y')}} - {{date('m/d/Y')}}">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>     
              <div class="card-body">
                <table class="table table-head-fixed text-nowrap data-table tablePenjualan" width="100%">
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
                  <tfoot>
                    <tr>
                      <th class="text-right" colspan="4"><span id="harga_akhir"></span></th>
                      <th class="text-right"><span class="uang_muka"></span></th>
                      <th class="text-right"><span id="diskon"></span></th>
                      <th class="text-right"><span id="piutang"></span></th>
                      <th colspan="2"></th>
                    </tr>
                  </tfoot>
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
      $('#reservation').daterangepicker({},
        function() {
          $('.tablePenjualan').DataTable().destroy();
          loadData();
      })
      loadData();
    })

    //TAMPIL DATA
    function loadData(){
      table = $('.tablePenjualan').DataTable({
        processing: true, serverSide: true, ordering: false,info: false,
        footerCallback: function(row, data, start, end, display){
          var api = this.api(), data, total = 0, total1 = 0;

          var intVal = function(i){
            return typeof i === 'string' ?
                i.replace(/[\$,]/g, '')*1 :
                typeof i === 'number' ?
                    i : 0;
          };

          if (data.length > 0) {  
            // console.log(api,data)          
              total = api.column(3).data().reduce(function(a, b){
                      return parseFloat(a) + parseFloat(b);
                    });
          }
          // Update footer
          var numFormat = $.fn.dataTable.render.number('.').display
          $(api.column(0).footer()).find('#harga_akhir').html(
            'Rp. ' + numFormat(total)
          );
        },
        ajax: {
          "url" : "{{ route('transaksi-penjualan.index') }}",
          "data": {
            date :  $('.drp-selected').text()
          }
        },
        language: {
          "emptyTable": "Tidak ada transaksi."
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
          {
            data:'total_harga', 
            name:'total_harga',
            render: $.fn.dataTable.render.number('.', '.', 0, 'Rp. ' )},
          {data:'diterima', name:'diterima'},
          {data:'diskon', name:'diskon'},
          {data:'piutang', name:'piutang'},
          {data:'keterangan', name:'keterangan'},
          {data:'action', name:'action'},
        ],
      });
    }

  </script>
@endsection
