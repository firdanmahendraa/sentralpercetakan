<div class="modal fade" id="modal-form" aria-hidden="true" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-bold text-center" id="modal-heading" style="margin:0 auto"></h4>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          @csrf
          @method('post')
          <div class="row">
            <input type="hidden" name="tgl_pengajuan" value="{{  date('Y/m/d') }}">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="namaMember">Nama</label>
                <div class="">
                  <select class="select form-control" name="id_karyawan">
                    <option>Pilih</option>
                      @foreach ($pengajuan['id_karyawan'] as $item)
                          <option value="{{ $item->id }}">{{ $item->nama }}</option>
                      @endforeach
                  </select>
                </div>
                <span class="help-block with-errors text-danger"></span>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="teleponMember">Nominal Pengajuan</label>
                <input type="text" class="form-control" name="saldo" placeholder="Masukkan jumlah pengajuan" required>
                <span class="help-block with-errors text-danger"></span>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label for="Keterangan">Keterangan</label>
                <input type="text" class="form-control" name="keterangan" placeholder="Potong gaji bulan depan" required>
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