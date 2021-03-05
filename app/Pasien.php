<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable = [
        'nomor_pasien',
        'nama_pasien',
        'alamat',
        'tgl_lahir',
        'agama',
        'pekerjaan',
        'telepon',
        'alergi_obat',
        'user_id',
    ];

    public function user_pasien(){
        return $this->belongsTo('App\User', 'user_id');
    }

}
