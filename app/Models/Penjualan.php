<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table        = 'penjualan';
    protected $primaryKey   = 'id_penjualan';
    protected $guarded      = [];

    // protected $casts = [
    //     'created_at' => 'datetime:d/m/Y'
    // ];

    public function customer(){
        return $this->hasOne(Customer::class, 'id', 'id_pelanggan');
    }

    public function users(){
        return $this->hasOne(User::class, 'id', 'id_user');
    }

    public function det_pembayaran(){
        return $this->hasOne(PenjualanHistori::class, 'id', 'id_histori');
    }

    protected $fillable = [
        'no_nota', 'id_pelanggan', 'acc_desain', 'total_item', 'total_harga', 'diskon', 'diterima', 'piutang', 'opsi_pembayaran', 'id_user', 'id_akun', 'id_bkm'
    ];
}
