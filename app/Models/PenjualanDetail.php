<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanDetail extends Model
{
    use HasFactory;

    protected $table        = 'penjualan_detail';
    protected $primaryKey   = 'id_penjualan_detail';
    protected $guarded      = [];
    
    public function produk(){
        return $this->hasOne(Produk::class, 'id_produk', 'id_produk');
    }

    public function penjualan(){
        return $this->hasMany(Penjualan::class, 'no_nota', 'no_nota');
    }

    // protected $fillable = [
    //     'id_penjualan', 'id_produk', 'jumlah', 'satuan', 'harga', 'sub_total'
    // ];
}
