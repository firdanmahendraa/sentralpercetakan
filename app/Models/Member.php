<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use HasFactory, Softdeletes;

    protected $table = 'mst_member';
    
    protected $fillable = [
        'kode_member', 'nama_member', 'alamat_member', 'telepon_member'
    ];
}
