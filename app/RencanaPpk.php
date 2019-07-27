<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RencanaPpk extends Model
{
    protected $fillable = [
        'tahun', 'opd_id', 'sasaran_id', 'indikator_id', 'target_id', 'program', 'kegiatan', 'anggaran'
    ];

    public function data_opd()
    {
        return $this->belongsTo('App\Opd', 'opd_id', 'id');
    }

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
