<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailresep extends Model
{
    protected $fillable = [
        'id_obat',
        'id_resep',
    ];
}
