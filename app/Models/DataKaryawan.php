<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataKaryawan extends Model{
    use HasFactory, SoftDeletes;

    protected $table = 'mst_data_karyawan';

    protected $fillable = [
        'nik', 'nama', 'jenis_kelamin', 'tanggal_lahir', 'alamat', 'telepon', 'jabatan'
    ];
}
