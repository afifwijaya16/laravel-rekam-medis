<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $fillable = [
        'no_resep',
        'resep',
        'tanggal_resep',
        'id_rekam_medis',
    ];
}
