<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capaian extends Model
{
    protected $fillable = [
        'tahun_awal', 'tahun_akhir', 'opd_id'
    ];

    public function data_opd()
    {
        return $this->belongsTo('App\Opd', 'opd_id', 'id');
    }
}
