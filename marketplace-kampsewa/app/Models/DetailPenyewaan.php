<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenyewaan extends Model
{
    use HasFactory;
    protected $table='detail_penyewaan';
    protected $fillable=[
        'id_penyewaan',
        'id_produk',
        'id_variant_produk',
        'qty',
        'subtotal',
        'pesan',
    ];
}
