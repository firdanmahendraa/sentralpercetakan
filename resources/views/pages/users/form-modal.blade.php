<div class="modal fade" id="modalUsers" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title text-bold text-center" id="modal-heading" style="margin:0 auto"></h4>
      </div>
      <div class="modal-body">
        <form id="addForm">
          <input type="hidden" name="id" id="id">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="Name">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="Username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="Username">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan email">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password">
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