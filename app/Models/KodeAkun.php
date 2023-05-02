<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KodeAkun extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mst_kode_akun';

    protected $fillable = [
        'id', 'nama_akun'
    ];
}
