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
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="Nama">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukkan nama" required>
                <span class="help-block with-errors text-danger"></span>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="JenisKelamin">Jenis Kelamin</label>
                <select class="form-control" name="jenis_kelamin" >
                  <option value="">-- Pilih Jenis Kelamin --</option>
                  <option value="L">Laki - Laki</option>
                  <option value="P">Perempuan</option>
                </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
                <label for="TanggalLahir">Tanggal Lahir</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest" required>
                  <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tanggal_lahir" placeholder="Masukkan tanggal"/>
                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>
                <span class="help-block with-errors text-danger"></span>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="Alamat">Alamat</label>
                <textarea class="form-control" name="alamat" placeholder="Masukkan alamat" required autofocus></textarea>
                <span class="help-block with-errors text-danger"></span>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="teleponMember">Telepon</label>
                <input type="text" class="form-control" name="telepon" placeholder="Masukkan nomor telepon" required>
                <span class="help-block with-errors text-danger"></span>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="Jabatan">Jabatan</label>
                <input type="text" class="form-control" name="jabatan" placeholder="Masukkan jabatan" required>
                <span class="help-block with-errors text-danger"></span>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-back" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Back</button>
        <button type="submit" class="btn btn-simpan" id="saveBtn" value="Create"><i class="fa fa-save"></i> Simpan</button>
      </div>
        </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->