<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;

    protected $table = 'produk'; //definisi nama tabel
    protected $fillable = ['nama_produk', 'kode', 'stock', 'kategori', 'harga'];
}
