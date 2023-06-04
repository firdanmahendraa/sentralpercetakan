@extends('layouts.master')

@section('title', 'Riwayat Transaksi Pembelian')

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
                <div class="col-md-8">
                  <button class="btn btn-sm btn-success" onclick="tambahPembelian('{{ route('transaksi_pembelian.generatepembelianform') }}')">Tambah Transaksi</button>
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
              <table class="table tbPembelian" width="100%">
                <thead>
                  <tr>
                    <th class="text-center" width="10%">TANGGAL</th>
                    <th class="text-center" width="20%">NAMA SUPPLIER</th>
                    <th class="text-center">NO NOTA</th>
                    <th class="text-center">TOTAL</th>
                    <th class="text-center">BAYAR</th>
                    <th class="text-center">Hutang</th>
                    <th class="text-center">Keterangan</th>
                    <th class="text-center" width="10%"><i class="fa fa-cog"></i></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th class="text-right" colspan="4"><span id="sub_total"></span></th>
                    <th class="text-right"><span id="tot_bayar"></span></th>
                    <th class="text-right"><span id="tot_hutang"></span></th>
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
  @include('pages.pembelian.supplier_modal')
  @include('pages.pembelian.detail')
@endsection

@section('js')
  <script type="text/javascript">
    let table, tableDetail;
    //TAMPIL DATA
    $(function(){
      $('#reservation').daterangepicker({},
        function() {
          $('.tbPembelian').DataTable().destroy();
          loadData();
      $('#sub_total').val($('.total_harga').text());
      })
      loadData();
      $('#sub_total').val($('.total_harga').text());
      // document.getElementById("sub_total").innerHTML=;
    })

    $(document).ready(function () {
      //get supplier
      $('.get_supplier').select2({
        placeholder: 'Cari Supplier',
        ajax: {
          url: "{{ route('transaksi_pembelian.getsupplier') }}",
          dataType: 'json',
          delay: 250,
          processResults: function(data) {
            return {
              results: $.map(data, function(item) {
                  return {
                    text: item.nama_supplier,
                    id: item.id
                  }
                })
            };
          },
          cache: true
        }
      });      
    })

    function loadData(){
      //TABEL PEMBELIAN
      table = $('.tbPembelian').DataTable({
        processing: true, serverSide: true, ordering: false, info: false,
        footerCallback: function(row, data, start, end, display){
          var api = this.api(), data, total = 0, totalBayar = 0, totalHutang = 0;

          var intVal = function(i){
            return typeof i === 'string' ?
                i.replace(/[\$,]/g, '')*1 :
                typeof i === 'number' ?
                    i : 0;
          };

          if (data.length > 0) {          
            total = api.column(3).data().reduce(function(a, b){
              return parseFloat(a) + parseFloat(b);
            });          
            totalBayar = api.column(4).data().reduce(function(a, b){
              return parseFloat(a) + parseFloat(b);
            });          
            totalHutang = api.column(5).data().reduce(function(a, b){
              return parseFloat(a) + parseFloat(b);
            });
          }
          // Update footer
          var numFormat = $.fn.dataTable.render.number('.').display
          $(api.column(3).footer()).find('#sub_total').html(
            'Rp. ' + numFormat(total)
          );
          $(api.column(4).footer()).find('#tot_bayar').html(
            'Rp. ' + numFormat(totalBayar)
          );
          $(api.column(5).footer()).find('#tot_hutang').html(
            'Rp. ' + numFormat(totalHutang)
          );
        },
        ajax: {
          "url" : "{{ route('transaksi_pembelian.index') }}",
          "data": {
            date :  $('.drp-selected').text()
          }
        },
        "language": {
          "emptyTable": "Belum ada pembelian bulan ini"
        },
        drawCallback:function(setting){
          $('#sub_total').html(setting.json.total_harga);
        },
        columnDefs: [
          {
            "targets": [0,1,2,3,4,5,6,7],
            "className": "va-mid"
          },{
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
          {data:'total', render: $.fn.dataTable.render.number('.', '.', 0, 'Rp. ' )},
          {data:'bayar', render: $.fn.dataTable.render.number('.', '.', 0, 'Rp. ' )},
          {data:'hutang', render: $.fn.dataTable.render.number('.', '.', 0, 'Rp. ' )},
          {data:'keterangan', name:'keterangan'},
          {data:'action', name:'action', orderable: false, searchable: false},
        ],
      })
    };

    // Tambah Pembelian => Pilih Supplier
    function tambahPembelian(url){
      $('#form_masuk').modal('show');
      $('#modal-heading').html("Pilih Supplier");

      $('#form_masuk form')[0].reset();
      $('#form_masuk form').attr('action', url);
    }

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

    // Tambah Supplier Baru
    $('#addSupplier').click(function() {
      var type = $('#supplier_opsi').val();
      if (type == 'old') {
          $(this).html('<i class="fa fa-minus"></i>');
          $('.get_supplier').attr('disabled', 'true');
          $('#form_masuk [name=_method]').val('post');
          $('#form-supplier').show('fade');
          $('#supplier_opsi').val('new');
          $('#nama_supplier').attr('required', 'true');
          $('#nama_supplier').removeAttr('disabled');
          $('#telepon_supplier').removeAttr('disabled');
          $('#alamat_supplier').removeAttr('disabled');
      } else {
          $(this).html('<i class="fa fa-plus"></i>');
          $('.get_supplier').removeAttr('disabled');
          $('#form_masuk [name=_method]').val('post');
          $('#nama_supplier').removeAttr('required');
          $('#nama_supplier').attr("disabled", "disabled");
          $('#telepon_supplier').attr("disabled", "disabled");
          $('#alamat_supplier').attr("disabled", "disabled");
          $('#form-supplier').hide('fade');
          $('#supplier_opsi').val('old');
          $('#nama_supplier').removeAttr('required');
      }
    })
  </script>
@endsection