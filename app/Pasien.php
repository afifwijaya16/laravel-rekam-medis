<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable = [
        'nama_pasien',
        'alamat',
        'tgl_lahir',
        'agama',
        'pekerjaan',
        'telepon',
        'alergi_obat',
    ];
}
