@extends('layouts.master')

@section('title', 'Pengaturan')

@section('content')
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
          <div class="card card-primary card-outline">    
            <form action="{{ route('setting.update') }}" method="post" class="form-setting" data-toggle="validator" enctype="multipart/form-data">
              @csrf        
              <div class="card-body">
                <div class="form-group row">
                  <label for="nama_perusahaan" class="col-sm-2 offset-1 col-form-label">Nama Perusahaan</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" required autofocus>
                    <span class="help-block with-errors"></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="alamat" class="col-sm-2 offset-1 col-form-label">Alamat</label>
                  <div class="col-sm-8">
                    <textarea type="text" class="form-control" name="alamat" id="alamat" required></textarea>
                    <span class="help-block with-errors"></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="telepon" class="col-sm-2 offset-1 col-form-label">Telepon</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="telepon" id="telepon" required>
                    <span class="help-block with-errors"></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="logo_login" class="col-sm-2 offset-1 col-form-label">Logo Login</label>
                  <div class="col-sm-8">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input"name="logo_login" id="logo_login"
                      onchange="preview('.logo-login', this.files[0])">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <span class="help-block with-errors"></span>
                    <div class="logo-login mt-3"></div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="bg_login" class="col-sm-2 offset-1 col-form-label">Background Login</label>
                  <div class="col-sm-8">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input"name="bg_login" id="bg_login"
                      onchange="preview('.bg_login', this.files[0]), 400">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <span class="help-block with-errors"></span>
                    <div class="bg_login mt-3"></div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="logo_nota" class="col-sm-2 offset-1 col-form-label">Logo Nota</label>
                  <div class="col-sm-8">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input"name="logo_nota" id="logo_nota"
                      onchange="preview('.logo-nota', this.files[0], 500)">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <span class="help-block with-errors"></span>
                    <div class="logo-nota mt-3"></div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button class="btn btn-simpan float-right"><i class="fa fa-save"></i> Simpan Perubahan</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('js')
<script>
  $(function(){
    showData();
    // FUNGSI EDIT DATA
    $('.form-setting').validator().on('submit', function(e){
      if (! e.preventDefault()) {
        $.ajax({
          url: $('.form-setting').attr('action'),
          type: $('.form-setting').attr('method'),
          data: new FormData($('.form-setting')[0]),
          async: false,
          processData: false,
          contentType: false
        })
        .done(response => {
          showData();
          Swal.fire({
              icon: 'success',
              title: 'Data berhasil disimpan!',
              timer: 3000
            }) 
        })
        .fail(response => {
          alert('Tidak dapat menyimpan data');
          return;
        });
      }
    });
  });

  // TAMPIL DATA PENGATURAN
  function showData() {
    $.get('{{ route('setting.show') }}')
    .done(response => {
      $('[name=nama_perusahaan]').val(response.nama_perusahaan);
      $('[name=alamat]').val(response.alamat);
      $('[name=telepon]').val(response.telepon);
      $('title').text(response.nama_perusahaan + ' | Pengaturan');
      $('.brand-text').text(response.nama_perusahaan);
      
      $('.logo-login').html(`<img src="{{ url('/') }}${response.logo_login}" width="200">`);
      $('.bg_login').html(`<img src="{{ url('/') }}${response.bg_login}" width="400">`);
      $('.logo-nota').html(`<img src="{{ url('/') }}${response.logo_nota}" width="500">`);
    })
    .fail(response => {
      alert('Tidak dapat menampilkan data');
      return;
    })
  }
</script>
@endsection