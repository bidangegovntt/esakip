<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RpjmdLayout extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tujuan_id', 'sasaran_id', 'indikator_id', 'strategi', 'kebijakan'
    ];

    public function data_target()
    {
        return $this->hasMany('App\RpjmdIndikatorKinerjaTarget', 'rpjmd_indikator_id', 'id');
    }
    
    public function data_tujuan()
    {
        return $this->belongsTo('App\RpjmdTujuan', 'tujuan_id', 'id');
    }

    public function data_sasaran()
    {
        return $this->belongsTo('App\RpjmdSasaran', 'sasaran_id', 'id');
    }

    public function data_indikator()
    {
        return $this->belongsTo('App\RpjmdIndikatorKinerja', 'indikator_id', 'id');
    }
}
