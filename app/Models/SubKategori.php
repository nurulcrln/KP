<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKategori extends Model
{
    use HasFactory;

    protected $table = 'subkategori';
    protected $primaryKey = "id_subkategori";
    protected $quarded = [];
    protected $fillable = ['id_kategori', 'sub_kategori',];
}

