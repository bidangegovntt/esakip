<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RealisasiPpk extends Model
{
    protected $fillable = [
        'sasaran_id', 'indikator_id', 'target_id', 'program', 'kegiatan', 'anggaran'
    ];

    public function data_sasaran()
    {
        return $this->belongsTo('App\DtSasaran', 'sasaran_id', 'id');
    }

    public function data_indikator()
    {
        return $this->belongsTo('App\DtIndikator', 'indikator_id', 'id');
    }

    public function data_target()
    {
        return $this->belongsTo('App\DtTarget', 'target_id', 'id');
    }
}
