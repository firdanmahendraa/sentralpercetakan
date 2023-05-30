<div class="modal fade" id="modalUsers" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal-heading"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addForm">
          <input type="hidden" name="id" id="id">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="Name">Nama Pengguna</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama">
              </div>
              <div class="form-group">
                <label for="Username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label>Levels</label>
                <select class="form-control" name="levels">
                  <option value="Owner">Owner</option>
                  <option value="Admin">Admin</option>
                </select>
              </div>
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