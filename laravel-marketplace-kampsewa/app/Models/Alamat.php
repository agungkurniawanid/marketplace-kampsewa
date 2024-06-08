<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;

    protected $table = 'alamat';

    protected $fillable = [
        'id_user',
        'longitude',
        'latitude',
        'detail_lainnya',
        'type',
    ];

    // Accessor untuk kolom type
    public function getTypeAttribute($value)
    {
        $types = [
            0 => 'Rumah',
            1 => 'Toko',
            2 => 'Kantor'
        ];
        return $types[$value] ?? 'Unknown';
    }
}
