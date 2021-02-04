<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $fillable = [
        'nomor_obat',
        'nama',
        'gambar',
        'harga',
        'stock',
        'satuan',
        'kemasan',
        'komposisi',
        'dosis',
        'keterangan',
    ];
}
