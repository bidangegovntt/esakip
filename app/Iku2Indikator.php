<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iku2Indikator extends Model
{
    protected $fillable = [
        'indikator_id', 'deskripsi'
    ];

    public function data_sasaran()
    {
        return $this->belongsTo('App\DtIndikator', 'indikator_id', 'id');
    }
}
