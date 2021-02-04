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
        'id_dokter',
        'status_rekam_medis',
    ];

    public function pasien(){
        return $this->belongsTo('App\Pasien', 'id_pasien');
    }

    public function dokter(){
        return $this->belongsTo('App\Dokter', 'id_dokter');
    }
}
