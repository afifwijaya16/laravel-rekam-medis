<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rekammedis extends Model
{
    protected $fillable = [
        'no_rekam',
        'id_pasien',
        'keluhan',
        'catatan_apoteker',
        'diagnosa',
        'tindakan',
        'id_dokter',
        'status_rekam_medis',
        'id_resep',
        'total_pembayaran',
        'catatan',
        'status_pembayaran',
        'id_kasir',
    ];

    public function pasien(){
        return $this->belongsTo('App\Pasien', 'id_pasien');
    }

    public function user(){
        return $this->belongsTo('App\User', 'id_dokter');
    }

    public function kasir(){
        return $this->belongsTo('App\User', 'id_kasir');
    }

    public function resep(){
        return $this->belongsTo('App\Resep', 'id_resep');
    }
}
