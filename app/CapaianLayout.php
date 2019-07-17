<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CapaianLayout extends Model
{
    protected $fillable = [
        'capaian_id', 
        'tahun', 
        'sasaran', 
        'iku', 
        'satuan', 
        'target', 
        'realisasi',
        'rencana_anggaran',
        'realisasi_anggaran',
        'capaian'
    ];

    public function data_capaian()
    {
        return $this->belongsTo('App\Capaian', 'capaian_id', 'id');
    }
}
