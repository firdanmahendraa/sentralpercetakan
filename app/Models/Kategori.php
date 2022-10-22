<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'mst_kategori';
    
    protected $fillable = [
        'kode_kategori', 'nama_kategori'
    ];

    protected $hidden = [
        
    ];
}