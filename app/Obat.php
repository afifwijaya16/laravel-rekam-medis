<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $fillable = [
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
