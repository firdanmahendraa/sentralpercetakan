<div class="modal fade" id="modal-form" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title text-bold text-center" id="modal-heading" style="margin:0 auto"></h4>
      </div>
      <form id="FormModal" method="post">
        @csrf
        @method('post')
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="namaProduk">Kode Produk</label>
                <input type="text" class="form-control" name="kode_produk" placeholder="Masukkan kode produk" required autofocus>
                <span class="help-block with-errors text-danger"></span>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label for="namaProduk">Nama Produk</label>
                <input type="text" class="form-control" name="nama_produk" placeholder="Masukkan nama produk" required>
                <span class="help-block with-errors text-danger"></span>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="hargaProduk">Harga Dasar</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Rp</span>
                  </div>
                  <input class="form-control" name="harga_produk" placeholder="Masukkan harga" required>
                </div>
                <span class="help-block with-errors text-danger"></span>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="satuanProduk">Ukuran Produk</label>
                <input type="text" class="form-control" name="ukuran_produk" placeholder="contoh: A3+ / A4" required>
                <span class="help-block with-errors text-danger"></span>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="satuanProduk">Perhitungan Harga</label>
                <select name="type_produk" class="form-control">
                  <option value="qty">Qty</option>
                  <option value="meter">Meter</option>
                </select>
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