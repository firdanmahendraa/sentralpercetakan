<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanTransaction extends Model
{
    use HasFactory;

    protected $table        = 'transaction_cart';
    protected $guarded      = [];
    
    public function produk(){
        return $this->hasOne(Produk::class, 'id_produk', 'id_produk');
    }

    public function penjualan(){
        return $this->hasMany(Penjualan::class, 'id_penjualan', 'id_penjualan');
    }

}
