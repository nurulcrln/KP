<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_Detail extends Model
{
    use HasFactory;
    protected $table ='transaksi_detail';
    protected $primaryKey = "id_transaksi_detail";
    protected $guarded = [];
    protected $fillable = ['id_transaksi', 'id_produk',];
}
