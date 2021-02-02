<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $fillable = [
        'nama_dokter',
        'alamat_dokter',
        'tgl_lahir_dokter',
        'agama_dokter',
        'telp_dokter',
    ];
}
