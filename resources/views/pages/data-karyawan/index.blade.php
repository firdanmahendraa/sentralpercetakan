@extends('layouts.master')

@section('title', 'Data Karyawan')

@section('content')
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">            
              <div class="card-body">
                <div class="mb-2 ">
                  <button class="btn btn-primary btn-sm" onclick="addForm('{{ route('data-karyawan.store') }}')">
                    <i class="fa fa-plus"> Tambah Karyawan</i>
                  </button>
                  <a href="{{ route('data-karyawan.trash') }}" class="btn btn-danger btn-sm float-right">
                    <i class="fa fa-trash"> Trash</i>
                  </a>
                </div>
                <table class="table table-head-fixed text-nowrap data-table" style="width: 100%" id="tabelKaryawan">
                  <thead>
                    <tr>
                      <th style="width: 5%">
                        <input type="checkbox" name="selectAll" id="selectAll">
                      </th>
                      <th style="width: 5%">No</th>
                      <th>NIK</th>
                      <th>Nama</th>
                      <th>L / P</th>
                      <th>Tanggal Lahir</th>
                      <th>Alamat</th>
                      <th>Telepon</th>
                      <th>Jabatan</th>
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
  @include('pages.data-karyawan.form-modal') 
@endsection

@section('js')
  <script type="text/javascript">
    //DATE PICKER
    $('#reservationdate').datetimepicker({
        format: 'YYYY/MM/DD'
    }); 

    let table;
    $(function(){
      //TAMPIL DATA
      table = $('.table').DataTable({
        "scrollX": true,
        processing: true,
        severSide: true,
        ajax:"{{ route('data-karyawan.index') }}",
        columns:[
          {data:'selectAll', name:'selectAll'},
          {data:'DT_RowIndex', name:'DT_RowIndex'},
          {data:'nik', name:'nik'},
          {data:'nama', name:'nama'},
          {data:'jenis_kelamin', name:'jenis_kelamin'},
          {data:'tanggal_lahir', name:'tanggal_lahir'},
          {data:'alamat', name:'alamat'},
          {data:'telepon', name:'telepon'},
          {data:'jabatan', name:'jabatan'},
          {data:'action', name:'action'},
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
              showConfirmButton: TRUE,
              timer: 2000
            })
            table.ajax.reload();
          })
          .fail((errors) => {
            Swal.fire({
              icon: 'error',
              title: 'Data gagal disimpan!',
              showConfirmButton: TRUE,
              timer: 2000
            })
            return;
          });
        }
      })
    });

    //TAMBAH DATA
    function addForm(url){
      $('#modal-form').modal('show');
      $('#modal-heading').html("Tambah Karyawan");

      $('#modal-form form')[0].reset();
      $('#modal-form form').attr('action', url);
      $('#modal-form [name=_method]').val('post');
      $('#modal-form [name=nik]').focus();
    }

    //EDIT DATA
    function editForm(url){
      $('#modal-form').modal('show');
      $('#modal-heading').html("Edit Karyawan");

      $('#modal-form form')[0].reset();
      $('#modal-form form').attr('action', url);
      $('#modal-form [name=_method]').val('put');
      $('#modal-form [name=nik]').focus();

      $.get(url)
        .done((response) => {
          $('#modal-form [name=nik]').val(response.nik);
          $('#modal-form [name=nama]').val(response.nama);
          $('#modal-form [name=tanggal_lahir]').val(response.tanggal_lahir);
          $('#modal-form [name=alamat]').val(response.alamat);
          $('#modal-form [name=telepon]').val(response.telepon);
          $('#modal-form [name=jabatan]').val(response.jabatan);
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
              showConfirmButton: true,
              timer: 1500
            }) 
            table.ajax.reload();
          })
          .fail((errors) => {
            Swal.fire({
              icon: 'error',
              title: 'Data tidak dapat dihapus!',
              showConfirmButton: true,
              timer: 2000
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