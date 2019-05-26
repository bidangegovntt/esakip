<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rpjmd extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tahun_awal', 'tahun_akhir', 'tujuan', 'sasaran_id', 'indikator_kinerja_id'
    ];
    
    public function data_sasaran()
    {
        return $this->belongsTo('App\RpjmdSasaran', 'sasaran_id', 'id');
    }

    public function data_indikator_kinerja()
    {
        return $this->belongsTo('App\RpjmdIndikatorKinerja', 'indikator_kinerja_id', 'id');
    }
}
