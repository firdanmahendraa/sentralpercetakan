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

    protected $casts = [
        'created_at' => 'datetime:d/m/Y'
    ];

    protected $fillable = [
        'nama_pemesan', 'alamat_pemesan', 'telepon_pemesan', 'acc_desain', 'total_item', 'total_harga', 'diskon', 'bayar', 'diterima', 'id_user'
    ];
}
