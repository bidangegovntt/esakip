<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iku2 extends Model
{
    protected $fillable = [
        'tahun_awal', 'tahun_akhir', 'opd_id', 'sasaran_id', 'indikator_id', 'penjelasan', 'penanggung_jawab'
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
}
