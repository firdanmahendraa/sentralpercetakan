<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use HasFactory, Softdeletes;

    protected $table = 'mst_produk';
    protected $primaryKey = 'id_produk';
    
    protected $fillable = [
        'kode_produk', 'nama_produk', 'satuan_produk', 'harga_produk', 'ukuran_produk', 'type_produk'
    ];

}
