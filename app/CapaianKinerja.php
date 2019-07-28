<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CapaianKinerja extends Model
{
    protected $fillable = [
        'realisasi_kinerja_id', 'capaian'
    ];

    public function data_realisasi_kinerja()
    {
        return $this->belongsTo('App\Rk', 'realisasi_kinerja_id', 'id');
    }
}
