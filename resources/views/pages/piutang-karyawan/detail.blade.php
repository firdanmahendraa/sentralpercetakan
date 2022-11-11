@extends('layouts.master')

@section('title', 'Detail Piutang')

@section('css')
<style type="text/css">
  .table td, .table th {
      padding: 0px!important;
  }
  div.dataTables_wrapper {
      width: 100%;
      margin: 0 auto;
  }
</style>
@endsection

@section('content')
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-12">
          <div class="card card-primary card-outline">        
            <div class="card-header">
              <div class="row justify-content-between">
                <button class="btn btn-success btn-sm" onclick="addForm('{{ route('piutang-karyawan.store') }}')">Tambah Kredit</i></button>
                <a href="{{ route('piutang-karyawan.store') }}" class="btn btn-secondary btn-sm "><i class="fa fa-chevron-left"> Back</i></a>
              </div>    
            </div>
            <div class="card-body">
              <div class="row mb-2">
                <div class="col md-1">
                    <label for="">Nama</label><br>
                    <label for="">Alamat</label><br>
                    <label for="">No. Telp</label>
                </div>
                <div class="col-md-5">  
                  {{-- @forelse ($data as $item)
                    <label for="">: {{ $item->saldo }}</label><br>
                    <label for="">: {{ $item->saldo }}</label><br>
                    <label for="">: {{ $item->saldo }}</label><br>
                  @empty
                    <label for="">: Nama</label><br>
                    <label for="">: Alamat</label><br>
                    <label for="">: No. Telp</label>
                  @endforelse                 --}}
                </div>
                <div class="col-md-6">
                  <div class="row float-right">
                    <div class="col-12">
                    </div>
                  </div>
                </div>
              </div>
              <table class="table table-head-fixed text-nowrap data-table tableDetail text-center" style="width: 100%; padding:0px;" id="tabelMember">
                <thead>
                  <tr>
                    <th rowspan="2" class="align-middle">Tanggal</th>
                    <th rowspan="2" class="align-middle">Keterangan</th>
                    <th colspan="2">Mutasi</th>
                    <th rowspan="2" class="align-middle">Saldo</th>
                  </tr>
                  <tr>
                    <th>Debit</th>
                    <th>Kredit</th>
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
  $(document).ready(function() {
      $('.select').select2();
  });
  
    let table;
    //TAMPIL DATA OWNER
    $(function(){
      table = $('.tableDetail').DataTable({
        processing: true,
        severSide: true,
        paging: false,
        searching: false,
        ordering: false,
        ajax:"{{ route('piutang-karyawan.detail') }}",
        columns:[
          {data:'created_at', name:'created_at'},
          {data:'keterangan', name:'keterangan'},
          {data:'debit', name:'debit'},
          {data:'kredit', name:'kredit'},
          {data:'sisa_saldo', name:'sisa_saldo'},
        ],
      });

      //VALIDATOR
      $('#modal-form').validator().on('submit',function(e){
        if (! e.preventDefault()) {
          $.ajax({
            url : $('#modal-form form').attr('action'),
            type: 'post',
            data: $('#modal-form form').serialize()
          })
          .done((response) => {
            $('#modal-form').modal('hide');
            Swal.fire({
              icon: 'success',
              title: 'Data berhasil disimpan',
              timer: 1500
            })
            table.ajax.reload();
          })
          .fail((errors) => {
            Swal.fire({
              icon: 'error',
              title: 'Data gagal disimpan!',
              showConfirmButton: false,
            })
            return;
          });
        }
      })
    });

    //AJUKAN PINJAMAN
    function addForm(url){
      $('#modal-form').modal('show');
      $('#modal-heading').html("Ajukan Pinjaman");

      $('#modal-form form')[0].reset();
      $('#modal-form form').attr('action', url);
      $('#modal-form [name=_method]').val('post');
      $('#modal-form [name=nama_member]').focus();
    } 
  </script>
@endsection
