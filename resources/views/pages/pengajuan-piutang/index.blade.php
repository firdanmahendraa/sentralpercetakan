@extends('layouts.master')

@section('title', 'Pengajuan Piutang')

@section('content')
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">            
              <div class="card-body">
                <div class="mb-2 justify-content-between">
                  <span>Tabel owner</span>
                </div>
                <table class="table table-head-fixed text-nowrap data-table tableOwner" style="width: 100%" id="tabelMember">
                  <thead>
                    <tr>
                      <th style="width: 5%">No</th>
                      <th>Tanggal</th>
                      <th>Nama</th>
                      <th>Keterangan</th>
                      <th>Saldo</th>
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
  @include('pages.pengajuan-piutang.form-modal') 

  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">            
              <div class="card-body">
                <div class="mb-2 ">
                  <span>Tabel Admin</span>
                  <button class="btn btn-success btn-sm" onclick="addForm('{{ route('pengajuan-piutang.store') }}')">Ajukan Pinjaman</button>
                </div>
                <table class="table tableAdmin table-head-fixed text-nowrap data-table" style="width: 100%" id="tabelMember">
                  <thead>
                    <tr>
                      <th style="width: 5%">No</th>
                      <th>Tanggal</th>
                      <th>Nama</th>
                      <th>Keterangan</th>
                      <th>Saldo</th>
                      <th>Status</th>
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
      table = $('.tableOwner').DataTable({
        processing: true,
        severSide: true,
        ajax:"{{ route('pengajuan-piutang.index') }}",
        columns:[
          {data:'DT_RowIndex', name:'DT_RowIndex'},
          {data:'tgl_pengajuan', name:'tgl_pengajuan'},
          {data:'nama', name:'nama'},
          {data:'keterangan', name:'keterangan'},
          {data:'saldo', name:'saldo'},
          {data:'status', name:'status'},
          {data:'action', name:'action'},
        ],
      });
      //TAMPIL DATA OWNER
      table = $('.tableAdmin').DataTable({
        processing: true,
        severSide: true,
        ajax:"{{ route('pengajuan-piutang.index') }}",
        columns:[
          {data:'DT_RowIndex', name:'DT_RowIndex'},
          {data:'tgl_pengajuan', name:'tgl_pengajuan'},
          {data:'nama', name:'nama'},
          {data:'keterangan', name:'keterangan'},
          {data:'saldo', name:'saldo'},
          {data:'status', name:'status'},
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

    //TAMBAH DATA
    function addForm(url){
      $('#modal-form').modal('show');
      $('#modal-heading').html("Ajukan Pinjaman");

      $('#modal-form form')[0].reset();
      $('#modal-form form').attr('action', url);
      $('#modal-form [name=_method]').val('post');
      $('#modal-form [name=nama_member]').focus();
    }

    //EDIT DATA
    function editForm(url){
      $('#modal-form').modal('show');
      $('#modal-heading').html("Edit Member");

      $('#modal-form form')[0].reset();
      $('#modal-form form').attr('action', url);
      $('#modal-form [name=_method]').val('put');
      $('#modal-form [name=nama_member]').focus();

      $.get(url)
        .done((response) => {
          $('#modal-form [name=nama_member]').val(response.nama_member);
          $('#modal-form [name=alamat_member]').val(response.alamat_member);
          $('#modal-form [name=telepon_member]').val(response.telepon_member);
        })
        .fail((errors) => {
          alert('Tidak dapat menampilkan data');
          return;
        });
    }

    //DELETE DATA
    function deleteData(url) {
      Swal.fire({
        title: 'Apakah anda yakin?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#28a745',
        cancelButtonColor: '#dc3545',
        confirmButtonText: 'Ya!',
        cancelButtonText: 'Tidak'
      }).then((result) => {
        if (result.isConfirmed) {
          $.post(url,{
            '_token': $('[name=csrf-token]').attr('content'),
            '_method': 'delete'
          })
          .done((response) => {
            Swal.fire({
              icon: 'success',
              title: 'Data berhasil dihapus!',
              showConfirmButton: false,
              timer: 1500
            }) 
            table.ajax.reload();
          })
          .fail((errors) => {
            Swal.fire({
              icon: 'error',
              title: 'Data tidak dapat dihapus!',
            }) 
            return;
          })
        }else if (result.dismiss === Swal.DismissReason.cancel) {
          swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
          )
        }
      })
    }

  </script>
@endsection