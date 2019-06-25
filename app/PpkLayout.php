<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PpkLayout extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'ppk_id', 'sasaran_id', 'indikator_id', 'pagu_anggaran'
    ];

    public function data_ppk()
    {
        return $this->belongsTo('App\Ppk', 'ppk_id', 'id');
    }

    public function data_sasaran()
    {
        return $this->belongsTo('App\PpkSasaran', 'sasaran_id', 'id');
    }

    public function data_indikator_kinerja()
    {
        return $this->belongsTo('App\PpkIndikatorKinerja', 'indikator_id', 'id');
    }

    public function data_realisasi_kinerja()
    {
        return $this->hasMany('App\RealisasiKinerja', 'indikator_kinerja_id', 'indikator_id');
    }
}
