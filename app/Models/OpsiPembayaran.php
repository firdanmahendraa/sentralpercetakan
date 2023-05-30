<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpsiPembayaran extends Model
{
    use HasFactory;

    protected $table = 'mst_opsi_pembayaran';
    
    protected $fillable = [
        'opsi_pembayaran', 'nomor_rekening', 'atas_nama'
    ];
}
