<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CapaianLayout extends Model
{
    protected $fillable = [
        'capaian_id', 
        'sasaran', 
        'iku', 
        'satuan', 
        'target', 
        'realisasi',
        'rencana_anggaran',
        'realisasi_anggaran',
        'capaian',
        'triwulan'
    ];

    public function data_capaian()
    {
        return $this->belongsTo('App\Capaian', 'capaian_id', 'id');
    }
}
