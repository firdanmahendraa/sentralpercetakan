<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PiutangKaryawan extends Model
{
    use HasFactory;

    protected $table = 'piutang_karyawan';
    protected $primaryKey = 'id_piutang_karyawan';
    
    protected $casts = [
        'tgl_pengajuan' => 'date:d/m/Y'
    ];

    protected $fillable = [
        'tgl_pengajuan', 'id_karyawan', 'keterangan', 'jml_pengajuan', 'status', 'total_pitang', 'total_terbayar'
    ];
}
