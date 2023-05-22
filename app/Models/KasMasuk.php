<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasMasuk extends Model
{
    use HasFactory;
    
    protected $table        = 'tb_bkm';

    public function det_bayar(){
        return $this->hasOne(Penjualan::class, 'id_penjualan', 'id_penjualan');
    }

    public function customer(){
        return $this->hasOne(Customer::class, 'id', 'id_pelanggan');
    }

    
}
