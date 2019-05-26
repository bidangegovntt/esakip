<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RpjmdIndikatorKinerja extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'rpjmd_id', 'rpjmd_sasaran_id', 'indikator'
    ];

    public function data_rpjmd()
    {
        return $this->belongsTo('App\Rpjmd', 'rpjmd_id', 'id');
    }

    public function data_rpjmd_sasaran()
    {
        return $this->belongsTo('App\RpjmdSasaran', 'rpjmd_sasaran_id', 'id');
    }
}
