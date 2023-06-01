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
                <div class="col-md-5 text-right text-bold mt-1">Pilih Periode : </div>
                <div class="col-2">
                  <div class="input-group">
                    <input type="text" class="form-control text-right" id="reservation" value="{{date('m/d/Y')}}">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>     
            <div class="card-body">
              <table class="table tablePendapatan" id="tables" width="100%">
                <thead>
                  <tr>
                    <th class="text-center va-mid" rowspan="2" width="10%">TANGGAL</th>
                    <th class="text-center va-mid" rowspan="2" width="10%">PERKIRAAN</th>
                    <th class="text-center" colspan="2" width="60%">URAIAN</th>
                    <th class="text-center va-mid" rowspan="2">JUMLAH</th>
                  </tr>
                  <tr>
                    <td>Keterangan</td>
                    <td class="text-right">No Invoice</td>
                  </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                  <tr>
                    <td colspan="4" class="text-right"><b>Total</b></td>
                    <td class="text-right pr-2"><b id="total_pendapatan"></b></td>
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
      $('#reservation').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minYear: 2000,
        maxYear: parseInt(moment().format('YYYY'),10)
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
        footerCallback: function(row, data, start, end, display){
          var api = this.api(), data, total = 0;

          var intVal = function(i){
            return typeof i === 'string' ?
                i.replace(/[\$,]/g, '')*1 :
                typeof i === 'number' ?
                    i : 0;
          };

          if (data.length > 0) {          
              total = api.column(4).data().reduce(function(a, b){
                      return parseFloat(a) + parseFloat(b);
                    });
          }
          // Update footer
          var numFormat = $.fn.dataTable.render.number('.').display
          $(api.column(4).footer()).find('#total_pendapatan').html(
            'Rp. ' + numFormat(total)
          );
        },
        ajax:{
          "url": "{{ route('laporan_pendapatan.data') }}",
          "data": {
            date :  $('.drp-selected').text()
          }
        },
        "language": {
          "emptyTable": "Tidak ada transaksi Hari Ini."
        },
        columnDefs: [
          {
            "targets": [3,4],
            "className": "dt-body-right"
          },{
            "targets": [0,1],
            "className": "dt-body-center"
          }
        ],
        columns:[
          {data:'created_at', name:'created_at'},
          {data:'id_akun', name:'id_akun'},
          {data:'uraian', name:'uraian'},
          {data:'no_nota', name:'no_nota'},
          {data:'debet', render: $.fn.dataTable.render.number('.', '.', 0, 'Rp. ' )},
        ],
      });
    }

 </script>
@endsection