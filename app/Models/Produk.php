<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = "id_produk";
    protected $quarded = [];
    protected $fillable = ['sub_kategori'];

    public function supplier(){
        return $this->hasOne(Supplier::class, 'id_supplier', 'id_supplier');
    }
}

