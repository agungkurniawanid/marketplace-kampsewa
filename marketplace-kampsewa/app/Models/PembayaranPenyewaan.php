<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranPenyewaan extends Model
{
    use HasFactory;
    protected $table='pembayaran_penyewaan';
    protected $fillable=[
        'id_penyewaan',
        'bukti_pembayaran',
        'kembalian_pembayaran',
        'total_pembayaran',
        'metode',
        'status_pembayaran'
    ];
}
