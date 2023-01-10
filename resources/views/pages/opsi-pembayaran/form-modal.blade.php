<div class="modal fade" id="modal-form" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title text-bold text-center" id="modal-heading" style="margin:0 auto"></h4>
      </div>
      <form action="" method="post">
        @csrf
        @method('post')
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="namaProduk">Nama Bank</label>
                <input type="text" class="form-control" name="opsi_pembayaran" placeholder="Masukkan nama bank" required>
                <span class="help-block with-errors text-danger"></span>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label for="namaProduk">Nomor Rekening</label>
                <input type="text" class="form-control" name="nomor_rekening" placeholder="Masukkan nomor rekening" required>
                <span class="help-block with-errors text-danger"></span>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label for="namaProduk">Atas Nama</label>
                <input type="text" class="form-control" name="atas_nama" placeholder="Masukkan atas nama" required>
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