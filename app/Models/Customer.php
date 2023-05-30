<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'mst_customer';

    protected $fillable = [
        'nama_pelanggan', 'alamat_pelanggan', 'telepon_pelanggan'
    ];
}
