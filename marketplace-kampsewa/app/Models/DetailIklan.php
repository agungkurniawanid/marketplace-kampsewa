<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailIklan extends Model
{
    use HasFactory;

    protected $table = 'detail_iklan';

    protected $fillable = [
        'id_iklan',
        'tanggal_mulai',
        'tanggal_akhir',
        'start_date',
        'end_date',
        'harga_iklan',
        'status_iklan'
    ];
}
