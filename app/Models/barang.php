<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $table = 'barang'; //definisi nama tabel
    protected $fillable = ['kode_barang', 'produk_id', 'nama_barang', 'satuan', 'harga_jual', 'user_id', 'stok', 'ditarik'];
}
