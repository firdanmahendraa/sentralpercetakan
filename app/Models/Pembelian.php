<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $table = 'pembelian';
    
    protected $fillable = [
        'id_supplier', 'no_nota', 'sub_total', 'bayar', 'status'
    ];
    public function supplier(){
        return $this->hasOne(Supplier::class, 'id', 'id_supplier');
    }
}
