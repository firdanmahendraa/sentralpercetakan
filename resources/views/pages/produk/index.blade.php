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
                      <th>Kode Produk</th>
                      <th>Nama Produk</th>
                      <th>Harga</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    {{-- <tr>
                      <td>1</td>
                      <td>2022104001</td>
                      <td>2Ply Nota Impression 1/4</td>
                      <td>200.000</td>
                      <td>
                        <a href="" class="btn btn-sm btn-success">Edit</a>
                        <a href="" class="btn btn-sm btn-danger">Edit</a>
                      </td>
                    </tr> --}}
                  </tbody>
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
        severSide: true,
        ajax:"{{ route('data-produk.index') }}",
        columns:[
          {data:'DT_RowIndex', name:'DT_RowIndex'},
          {data:'kode_produk', name:'kode_produk'},
          {data:'nama_produk', name:'nama_produk'},
          {data:'harga_produk', name:'harga_produk'},
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
      $('#modal-heading').html("Tambah Produk");

      $('#modal-form form')[0].reset();
      $('#modal-form form').attr('action', url);
      $('#modal-form [name=_method]').val('post');
      $('#modal-form [name=nama_produk]').focus();
    }

    //EDIT DATA
    function editForm(url){
      $('#modal-form').modal('show');
      $('#modal-heading').html("Edit Produk");

      $('#modal-form form')[0].reset();
      $('#modal-form form').attr('action', url);
      $('#modal-form [name=_method]').val('put');
      $('#modal-form [name=nama_produk]').focus();

      $.get(url)
        .done((response) => {
          $('#modal-form [name=nama_produk]').val(response.nama_produk);
          $('#modal-form [name=harga_produk]').val(response.harga_produk);
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

    
    
    // 
    // $("#tambahProduk").click(function(){
    //   $('#id').val('');
    //   $('#addForm').trigger('reset');
    //   $('#modal-heading').html("Tambah Produk");
    //   $('#modalProduk').modal('show');
    // });
    // $("#saveBtn").click(function(e){
    //   e.preventDefault();
    //   $(this).html('Save');

    //   $.ajax({
    //     data:$("#addForm").serialize(),
    //     url:"{{ route('data-kategori.store') }}",
    //     type:"POST",
    //     dataType:'json',
    //     success:function(data){
    //       $('#addForm').trigger('reset');
    //       $('#modalProduk').modal('hide');
    //       Swal.fire({
    //         position: 'center',
    //         icon: 'success',
    //         title: 'Produk berhasil disimpan',
    //         showConfirmButton: false,
    //         timer: 1500
    //       }) 
    //       table.ajax.reload();
    //     },
    //     error:function(data){
    //       console.log('Error:',data);
    //     }
    //   });
    // });

    // //EDIT DATA
    // function editForm(url){
    //   $('#modalProduk').modal('show');
    //   $('#modal-heading').html("Edit Produk");

    //   $('#addForm').trigger('reset');
    //   $('#addForm').attr('action', url);
    //   $('#modalProduk [name=_method]').val('PUT');
    //   $('#modalProduk [name=nama_produk]').focus();

    //   $.get(url).done((response) => {
    //     $('#modalProduk [name=nama_produk]').val(response.nama_produk);
    //     $('#modalProduk [name=harga_produk]').val(response.harga_produk);
    //   }).fail((errors) => {
    //     alert('Tidak dapat menampilkan data');
    //     return;
    //   });
    // }

    //DELETE DATA
    

  </script>
@endsection