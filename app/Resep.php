<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    protected $fillable = [
        'no_resep',
        'resep',
        'id_user',
    ];

    public function detailreseps(){
        return $this->hasMany('App\Detailresep','id_resep');
    }

    public function user(){
        return $this->belongsTo('App\User', 'id_user');
    }
}
