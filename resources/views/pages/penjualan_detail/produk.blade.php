<div class="modal fade" id="modal-produk" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-bold text-center" id="modal-heading" style="margin:0 auto">Pilih Produk</h4>
        </div>
        <div class="modal-body">
            <table class="table table-bordered" id="tableProduk">
                <thead>
                    <th width="5%">No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th><i class="fa fa-cog"></i></th>
                </thead>
                <tbody>
                    @foreach ($produk as $key => $item)
                        <tr>
                            <td width="5%">{{ $key+1 }}</td>
                            <td>{{ $item->kode_produk }}</td>
                            <td>{{ $item->nama_produk }}</td>
                            <td>{{ $item->harga_produk }}</td>
                            <td>
                                <a href="#" class="btn btn-primary btn-sm btn-flat"
                                    onclick="pilihProduk('{{ $item->id_produk }}', '{{ $item->kode_produk }}')">
                                    <i class="fa fa-check-circle"> Pilih</i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->