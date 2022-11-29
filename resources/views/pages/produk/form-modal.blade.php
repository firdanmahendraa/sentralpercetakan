<div class="modal fade" id="modal-form" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal-heading"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
        @csrf
        @method('post')
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-4">
              <div class="form-group">
                <label for="namaProduk">Nama Produk</label>
                <input type="text" class="form-control" name="nama_produk" placeholder="Masukkan nama produk" required autofocus>
                <span class="help-block with-errors text-danger"></span>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="satuanProduk">Satuan Produk</label>
                <input type="text" class="form-control" name="satuan_produk" placeholder="Masukkan satuan produk" required autofocus>
                <span class="help-block with-errors text-danger"></span>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="hargaProduk">Harga</label>
                <input type="number" class="form-control" name="harga_produk" placeholder="Masukkan harga produk" required>
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