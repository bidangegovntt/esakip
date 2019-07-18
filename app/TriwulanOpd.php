<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TriwulanOpd extends Model
{
    protected $fillable = [
        'tahun', 'opd_id', 'capaian_id', 'triwulan', 'jumlah_indikator', 'tidak_tercapai', 'kurang_tercapai', 'tercapai'
    ];

    public function data_capaian()
    {
        return $this->belongsTo('App\Capaian', 'capaian_id', 'id');
    }

    public function data_opd()
    {
        return $this->belongsTo('App\Opd', 'opd_id', 'id');
    }
}
