<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekammedis extends Model
{
    protected $fillable = [
        'no_rekam',
        'id_pasien',
        'keluhan',
        'diagnoesa',
        'tindakan',
        'id_user',
        'status_rekam_medis',
        'id_resep',
        'catatan',
    ];

    public function pasien(){
        return $this->belongsTo('App\Pasien', 'id_pasien');
    }

    public function user(){
        return $this->belongsTo('App\User', 'id_user');
    }

    public function resep(){
        return $this->belongsTo('App\Resep', 'id_resep');
    }
}
