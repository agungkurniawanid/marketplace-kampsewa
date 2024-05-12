<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'id_user',
        'nama',
        'deskripsi',
        'harga',
        'stok',
        'status',
        'kategori',
        'variants',
        'foto_depan',
        'foto_belakang',
        'foto_kiri',
        'foto_kanan',
    ];
}