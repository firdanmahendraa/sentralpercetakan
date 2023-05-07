<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\PenjualanDetail;
use App\Models\Produk;
use Illuminate\Http\Request;
use DataTables, DB, Carbon\Carbon;

class PendapatanController extends Controller{
    public function index(){
      return view('pages.pendapatan.index');
    }
    
    public function data(Request $request){
      // Merubah string to array
      $date = explode('-', $request->date);
      
      $penjualan = Penjualan::with('customer','det_pembayaran')->orderBy('updated_at', 'asc');
        if (count($date) == 2) {
          if ($date[0] != '') {
              $penjualan = $penjualan->whereDate('updated_at', '>=', date('Y-m-d', strtotime($date[0])));
          }
          if ($date[1] != '') {
              $penjualan = $penjualan->whereDate('updated_at', '<=', date('Y-m-d', strtotime($date[1])));
          }
        }
      $penjualan = $penjualan->get();

      $data   = array();
      $total_harga    = 0;
      $total_diterima = 0;
      $total_diskon   = 0;
      $total_piutang  = 0;
      foreach ($penjualan as $item) {
        $row = array();
        $row['updated_at']      = $item['updated_at']->translatedFormat('d F Y');
        $row['no_nota']         = 'NT-'.$item['no_nota'];
        $row['nama_pelanggan']  = $item->customer['nama_pelanggan'];
        $row['total_harga']     = 'Rp. '.format_uang($item->total_harga);
        $row['diterima']        = 'Rp. '.format_uang($item->diterima);
        $row['diskon']          = 'Rp. '.format_uang($item->diskon);
        $row['piutang']         = 'Rp. '.format_uang($item->piutang);
        $row['opsi_pembayaran'] = $item->det_pembayaran['opsi_pembayaran'];
        $row['action']        = '
        <button type="button" class="btn btn-sm btn-default" data-id="'.$item->id_penjualan.'" onclick="detail('. $item->id_penjualan .')"><i class="fas fa-eye"></i> &nbsp; Detail</button>
          ';
        $data[] = $row;

        $total_harga      += $item->total_harga;
        $total_diterima   += $item->diterima;
        $total_diskon     += $item->diskon;
        $total_piutang    += $item->piutang;
      }
      $data[] = [
        'updated_at'       => '',
        'no_nota'          => '',
        'nama_pelanggan'   => '<div class="text-right"><b>Total</b></div>',
        'total_harga'      => '<b>Rp. '.format_uang($total_harga) .'</b>',
        'diterima'         => '<b>Rp. '.format_uang($total_diterima) .'</b>',
        'diskon'           => '<b>Rp. '.format_uang($total_diskon) .'</b>', 
        'piutang'          => '<b>Rp. '.format_uang($total_piutang) .'</b>',
        'opsi_pembayaran'  => '', 
        'action'           => '', 
      ];

      return datatables()
        ->of($data)
        ->addIndexColumn()
        ->rawColumns(['updated_at', 'no_nota','nama_pelanggan', 'total_harga', 'diterima', 'diskon', 'piutang', 'opsi_pembayaran', 'action'])
        ->make(true);
    }

    public function detail($id) {
      $detail = PenjualanDetail::with('produk','penjualan')->where('id_penjualan', $id)->get();
      $data   = array();
        foreach ($detail as $item) {
            $row = array();
            $row['nama_pesanan']    = $item['nama_pesanan'].'<br><small class="text-muted">'.
                                      $item->produk['nama_produk']. ' / ' .$item['det_pesanan']. ' - ' .$item['finishing_plong_qty']  ;
            $row['ukuran']          = $item['ukuran'];
            $row['harga']           = 'Rp. '.  format_uang($item->harga);
            $row['jumlah']          = $item['jumlah'].' '.$item['satuan'];
            $row['sub_total']       = 'Rp. '.  format_uang($item->sub_total);
            $data[] = $row;
        }

        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->rawColumns(['action','nama_pesanan', 'ukuran', 'kode_produk', 'jumlah', 'satuan'])
            ->make(true);
    }

}
