<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'mst_produk';
    protected $primaryKey = 'id_produk';
    
    protected $fillable = [
        'kode_produk', 'nama_produk', 'ukuran_produk', 'harga_produk', 'type_produk'
    ];

}
