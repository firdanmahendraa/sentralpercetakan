<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianDetail extends Model
{
    use HasFactory;
    protected $table = 'pembelian_detail';
    
    protected $fillable = [
        'id_pembelian', 'id_akun', 'nama_barang', 'satuan', 'unit', 'harga', 'total', 'status'
    ];

    public function pembelian(){
        return $this->hasMany(Pembelian::class, 'id', 'id_pembelian');
    }
}
