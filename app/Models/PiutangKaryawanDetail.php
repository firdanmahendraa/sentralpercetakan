<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PiutangKaryawanDetail extends Model{
    use HasFactory;

    protected $table = 'piutang_karyawan_detail';
    
    protected $casts = [
        'created_at' => 'date:d/m/Y'
    ];
    
    protected $fillable = [
        'id_piutang_karyawan', 'keterangan', 'debit', 'kredit'
    ];
}
