<div class="modal fade" id="modal-form" aria-hidden="true">
  <div class="modal-dialog modal-lg">
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
                <label for="namaProduk">Toko</label>
                <input type="text" class="form-control" name="nama_supplier" placeholder="Masukkan nama supplier" required autofocus>
                <span class="help-block with-errors text-danger"></span>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="hargaProduk">Telepon</label>
                <input type="text" class="form-control" name="telepon_supplier" placeholder="Masukkan telepon" required>
                <span class="help-block with-errors text-danger"></span>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label for="hargaProduk">Alamat</label>
                <textarea class="form-control" name="alamat_supplier" placeholder="Masukkan alamat" name="" id="" cols="30" rows="10"></textarea>
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