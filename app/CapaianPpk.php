<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CapaianPpk extends Model
{
    protected $fillable = [
        'opd_id', 'tahun', 'sasaran_id', 'rencana_ppk_id', 'realisasi_ppk_id', 'capaian'
    ];

    public function data_opd()
    {
        return $this->belongsTo('App\Opd', 'opd_id', 'id');
    }

    public function data_sasaran()
    {
        return $this->belongsTo('App\DtSasaran', 'sasaran_id', 'id');
    }

    public function data_rencana_ppk()
    {
        return $this->belongsTo('App\RencanaPpk', 'rencana_ppk_id', 'id');
    }

    public function data_realisasi_ppk()
    {
        return $this->belongsTo('App\RealisasiPpk', 'realisasi_ppk_id', 'id');
    }
}
