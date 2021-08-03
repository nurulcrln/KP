<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
<<<<<<< HEAD
    
    protected $table = 'penjualan';
    protected $quarded = [];
    protected $primaryKey = "no_invoice";
    protected $fillable = ['id_produk'];

    // public function supplier(){
    //     return $this->hasOne(Supplier::class, 'id_supplier', 'id_supplier');
    // }
=======

    protected $table = 'penjualan';
    protected $quarded = [];
>>>>>>> master
}
