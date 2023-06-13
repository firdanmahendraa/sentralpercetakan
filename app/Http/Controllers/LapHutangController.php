<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\PembelianDetail;
use App\Models\OpsiPembayaran;
use Illuminate\Http\Request;
use DataTables, DB, Carbon\Carbon;

class LapHutangController extends Controller{
    public function index(Request $request){
        $pembelian = Pembelian::with('supplier')->where(['keterangan'=>'hutang', 'status'=>'ok'])->orderBy('id', 'desc')->get();
        if($request->ajax()){
            $data = DataTables::of($pembelian)
            ->addIndexColumn()
            ->addColumn('created_at', function($item) {
                return $item->created_at->translatedFormat('d F Y');
            })
            ->addColumn('nama_supplier', function($item) {
                return $item->supplier['nama_supplier'];
            })
            ->addColumn('sub_total', function($item) {
                return 'Rp. '. format_uang($item->sub_total);
            })
            ->addColumn('bayar', function($item) {
                return 'Rp. '. format_uang($item->bayar);
            })
            ->addColumn('hutang', function($item) {
                return 'Rp. '. format_uang($item->hutang);
            })
            ->addColumn('action', function($item){
                return '
                    <div class="btn-group">
                        <button data-id="'.$item->id.'" onclick="detailPembelian('.$item->id.')" class="btn btn-sm btn-default"><i class="fas fa-eye"></i> &nbsp; Detail</button>

                        <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle  dropdown-icon" data-toggle="dropdown">
                          </button>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="'.url('laporan-hutang/bayar/'. $item->id).'">Bayar</a>
                          </div>
                        </div>
                    </div>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
            return $data;
        }
        return view('pages.lap_hutang.index');
    }

    public function pelunasan($id){
        $pelunasan  = Pembelian::with('supplier')->find($id);
        // Jika Piutang = 0, Kembali ke halaman index
        if($pelunasan->hutang == 0){
            return redirect()->route('laporan_hutang.index');
        }
        $pembelian_detail = PembelianDetail::where('id_pembelian' , $id)->get();
        $sisa_tagihan = abs($pelunasan->hutang);
        $opsi_pembayaran = OpsiPembayaran::get();
        return view('pages.lap_hutang.pelunasan',compact('pelunasan', 'pembelian_detail','sisa_tagihan','opsi_pembayaran'));
    }

    public function repayment(Request $request){
        DB::beginTransaction();
        try {
            // Tambah data => table kas keluar jika pembelian telah dilunasi
            PembelianDetail::where(['keterangan'=>'hutang','id_pembelian' => $request->id])->get([ 'id_pembelian', 'id_akun', 'uraian', 'sub_total' ])->each(function ($cart = [ 'id_pembelian', 'id_akun', 'uraian', 'sub_total' ]){
                $trans_det = $cart->replicate();
                $trans_det->setTable('tb_bkk');
                $trans_det->save();
            });

            $now = Carbon::now()->format('d/m/Y');
            PembelianDetail::where(['keterangan'=>'hutang','id_pembelian' => $request->id])->update(['keterangan'=>'lunas']);

            $updateTrans = Pembelian::find($request->id);
            // dd($updateTrans->hutang);
            $updateTrans->hutang = $updateTrans->hutang + $request->debet;
            $updateTrans->keterangan = "Lunas (".$request->opsi_pembayaran."/".$now.")" ;
            $updateTrans->update();

            DB::commit();
            return response()->json('Transaksi Berhasil', 200);
        } catch (Exception $e) {
            DB::rollback();
            $response =array(
                'success' => false,
                'message' => $e->getMessage()
            );
            return view('pages.lap_hutang.pelunasan', compact('response'));
        }
    }

    public function processRepayment(Request $request){
        $this->repayment($request);

        return redirect()->route('laporan_hutang.index')->with(['success' => 'Transaksi LUNAS']);
    }
}
