@extends('layouts.master')

@section('title', 'Data Produk')

@section('content')
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline">            
              <div class="card-body">
                <div class="mb-2 ">
                  <button class="btn btn-primary btn-sm" onclick="addForm('{{ route('data-produk.store') }}')">
                    <i class="fa fa-plus"> Tambah Produk</i>
                  </button>
                </div>
                <table class="table table-head-fixed text-nowrap data-table" style="width: 100%" id="tabelProduk">
                  <thead>
                    <tr>
                      <th style="width: 5%">No</th>
                      <th style="width: 10%">Kode Produk</th>
                      <th>Nama Produk</th>
                      <th>Harga</th>
                      <th>Ukuran</th>
                      <th>Perhitungan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
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
  @include('pages.produk.form-modal') 
@endsection

@section('js')
  <script type="text/javascript">

    let table;
    //TAMPIL DATA
    $(function(){
      table = $('.table').DataTable({
        processing: true,
        serverSide: true,
        ajax:"{{ route('data-produk.index') }}",
        columns:[
          {data:'DT_RowIndex', name:'DT_RowIndex'},
          {data:'kode_produk', name:'kode_produk'},
          {data:'nama_produk', name:'nama_produk'},
          {data:'harga_produk', name:'harga_produk'},
          {data:'ukuran_produk', name:'ukuran_produk'},
          {data:'type_produk', name:'type_produk'},
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
              title: response,
              timer: 2000
            })
            table.ajax.reload();
          })
          .fail((response) => {
            Swal.fire({
              icon: 'error',
              title: response.responseJSON.message,
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
      $('#modal-heading').html("Tambah Produk");

      $('#modal-form form')[0].reset();
      $('#modal-form form').attr('action', url);
      $('#modal-form [name=_method]').val('post');
    }

    //EDIT DATA
    $('body').on('click', '.editData', function () {
      let id = $(this).data('id');
      
      $('#modal-form').modal('show');
      $('#modal-heading').html("Edit Produk");

      //fetch data
      $.ajax({
        url: `data-produk/show/${id}`,
        type: "GET",
        cache: false,
        success:function(response){
          $('#FormModal').attr('action', `data-produk/update/${id}`);
          $('#modal-form [name=kode_produk]').val(response.kode_produk);
          $('#modal-form [name=nama_produk]').val(response.nama_produk);
          $('#modal-form [name=harga_produk]').val(response.harga_produk);
          $('#modal-form [name=ukuran_produk]').val(response.ukuran_produk);
          $('#modal-form [name=type_produk]').val(response.type_produk);
        },
        error:function(response){
          alert('Tidak dapat menampilkan data');
          return;
        }
      });
    });

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
        }
      })
    }

  </script>
@endsection