<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mst_customer';

    protected $fillable = [
        'nama_pelanggan', 'alamat_pelanggan', 'telepon_pelanggan'
    ];
}
