<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rpjmd extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tahun_awal', 'tahun_akhir', 'tujuan', 'sasaran', 'indikator_kinerja'
    ];

    public function data_target()
    {
        return $this->hasMany('App\RpjmdIndikatorKinerjaTarget', 'rpjmd_id', 'id');
    }
}
