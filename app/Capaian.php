<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capaian extends Model
{
    protected $fillable = [
        'tahun', 'tahun_awal', 'tahun_akhir', 'opd_id'
    ];

    public function data_opd()
    {
        return $this->belongsTo('App\Opd', 'opd_id', 'id');
    }

    public function data_layout()
    {
        return $this->hasMany('App\CapaianLayout', 'capaian_id', 'id');
    }

    public function data_triwulan()
    {
        return $this->hasMany('App\TriwulanOpd', 'capaian_id', 'id');
    }
}
