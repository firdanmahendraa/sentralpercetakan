<div class="modal fade" id="form_masuk" aria-hidden="true">
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
            <div class="col-sm-3 text-right">
              <label for="" class="col-form-label" style="text-align:right">Supplier *</label>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-5">
              <select class="get_supplier" type="hidden" name="id_supplier" required></select>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" style="">
              <input type="hidden" id="supplier_opsi" name="supplier_opsi" value="old">
              <button type="button" id="addSupplier" class="btn btn-md bg-blue"><i class="fa fa-plus"></i></button>
            </div>
          </div>
          <div class="mt-2" id="form-supplier" style="display: none;">
            <div class="form-group row">
              <label class="col-sm-3 text-right control-label">Nama Supplier *</label>
              <div class="col-sm-9">
                <input type="text" name="nama_supplier" id="nama_supplier" class="form-control" style="border-radius: 0" placeholder="Nama Supplier">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 text-right control-label">Telp. Supplier</label>
              <div class="col-sm-9">
                <input type="text" name="telepon_supplier" id="telepon_supplier" class="form-control" style="border-radius: 0" placeholder="Telp">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 text-right control-label">Alamat</label>
              <div class="col-sm-9">
                <textarea name="alamat_supplier" id="alamat_supplier" class="form-control" style="border-radius: 0"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-back" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Back</button>
          <button type="submit" class="btn btn-simpan" id="saveBtn" value="Create"><i class="fa fa-check"></i> Pilih</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->