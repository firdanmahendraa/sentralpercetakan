@extends('layouts.master')

@section('title', 'Pengajuan Piutang')

@section('content')
  <section class="content main-page">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">            
              <div class="card-body">
                <div class="mb-2 justify-content-between">
                  <button class="btn btn-primary btn-sm" onclick="addForm('{{ route('piutang-karyawan.store') }}')">Ajukan Pinjaman</i></button>
                </div>
                <table class="table table-head-fixed text-nowrap data-table tableOwner" style="width: 100%" id="tabelMember">
                  <thead>
                    <tr>
                      <th style="width: 5%">No</th>
                      <th>Tanggal</th>
                      <th>Nama</th>
                      <th>Jumlah Pengajuan</th>
                      <th>Keterangan</th>
                      <th>Status</th>
                      <th>Aksi</th>
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
  @include('pages.piutang-karyawan.form-modal') 
@endsection

@section('js')
  <script type="text/javascript">
  $(document).ready(function() {
      $('.select').select2();
  });
  
    let table;
    //TAMPIL DATA OWNER
    $(function(){
      table = $('.tableOwner').DataTable({
        processing: true,
        severSide: true,
        ajax:"{{ route('piutang-karyawan.index') }}",
        columns:[
          {data:'DT_RowIndex', name:'DT_RowIndex'},
          {data:'tgl_pengajuan', name:'tgl_pengajuan'},
          {data:'nama', name:'nama'},
          {data:'jml_pengajuan', name:'jml_pengajuan'},
          {data:'keterangan', name:'keterangan'},
          {data:'status', name:'status'},
          {data:'action', name:'action', orderable: false, searchable: false},
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