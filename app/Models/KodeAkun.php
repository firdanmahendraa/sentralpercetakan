<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeAkun extends Model
{
    use HasFactory;

    protected $table = 'mst_kode_akun';

    protected $fillable = [
        'id', 'nama_akun'
    ];
}
