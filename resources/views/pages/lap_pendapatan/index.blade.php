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
              <table class="table tablePendapatan">
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
                    <td class="text-right pr-2"><b>Rp. {{ format_uang($bkm) }}</b></td>
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
  @include('pages.lap_pendapatan.modal')
@endsection

@section('js')
  <script type="text/javascript">
    let table, tableDetail;
    //TAMPIL DATA
    
    $(function(){
      $('#reservation').daterangepicker({},
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
          {data:'debet', name:'debet'},
        ],
      });
    }

 </script>
@endsection