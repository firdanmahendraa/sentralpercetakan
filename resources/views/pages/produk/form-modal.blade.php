<div class="modal fade" id="modal-form" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal-heading"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          @csrf
          @method('post')
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="namaProduk">Nama Produk</label>
                <input type="text" class="form-control" name="nama_produk" placeholder="Masukkan nama produk" required autofocus>
                <span class="help-block with-errors text-danger"></span>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="hargaProduk">Harga</label>
                <input type="text" class="form-control" name="harga_produk" placeholder="Masukkan harga" required>
                <span class="help-block with-errors text-danger"></span>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" id="saveBtn" value="Create">Simpan</button>
      </div>
        </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->