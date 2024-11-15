<div class="modal fade" id="modal-form" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title text-bold text-center" id="modal-heading" style="margin:0 auto"></h4>
      </div>
      <div class="modal-body">
        <form id="FormModal" action="" method="post">
          @csrf
          @method('post')
          <div class="form-group row">
            <label for="code" class="col-sm-2 col-form-label">Kode</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="id" name="id" placeholder="Kode" required autofocus>
              <span class="help-block with-errors text-danger"></span>
            </div>
          </div>
          <div class="form-group row">
            <label for="category_name" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama_akun" name="nama_akun" placeholder="Keterangan" required>
              <span class="help-block with-errors text-danger"></span>
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