<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RpjmdIndikatorKinerjaTarget extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'rpjmd_indikator_kinerja_id', 'tahun'
    ];

    public function data_rpjmd_indikator_kinerja()
    {
        return $this->belongsTo('App\RpjmdIndikatorKinerja', 'rpjmd_indikator_kinerja_id', 'id');
    }
}
