<div class="modal fade" id="modal-form" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title text-bold text-center" id="modal-heading" style="margin:0 auto"></h4>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          @csrf
          @method('post')
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="Nik">NIK</label>
                <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan NIK" required autofocus>
                <span class="help-block with-errors text-danger"></span>
              </div>
              <div class="form-group row">
                <div class="col-sm-12">
                  <label for="JenisKelamin">Jenis Kelamin</label>
                </div>
                <div class="col-sm-3">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" required>
                    <label class="form-check-label">Laki - Laki</label>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" required>
                    <label class="form-check-label">Perempuan</label>
                  </div>
                </div>
                <span class="help-block with-errors text-danger"></span>
              </div>
              <div class="form-group" style="margin-top: 30px">
                <label for="Alamat">Alamat</label>
                <textarea class="form-control" name="nama_member" placeholder="Masukkan alamat" required autofocus></textarea>
                <span class="help-block with-errors text-danger"></span>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="Nama">Nama Lengkap</label>
                <input type="text" class="form-control" name="telepon_member" placeholder="Masukkan nama lengkap" required>
                <span class="help-block with-errors text-danger"></span>
              </div>
              <div class="form-group">
                <label for="TanggalLahir">Tanggal Lahir</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="teleponMember">Telepon</label>
                <input type="text" class="form-control" name="telepon_member" placeholder="Masukkan nama nomor telepon" required>
                <span class="help-block with-errors text-danger"></span>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn" data-dismiss="modal" style="background-color: #e4bb05; color: #fff"><i class="fa fa-arrow-left"></i> Back</button>
        <button type="submit" class="btn btn-success" id="saveBtn" value="Create" style="background-color: #28A745"><i class="fa fa-save"></i> Simpan</button>
      </div>
        </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->