<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detailresep extends Model
{
    protected $fillable = [
        'id_obat',
        'id_resep',
        'keterangan',
    ];

    public function resep(){
        return $this->belongsTo('App\Resep', 'id_resep');
    }

    public function obat(){
        return $this->belongsTo('App\Obat', 'id_obat');
    }
}
