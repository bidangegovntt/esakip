<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PerjanjianKinerjaLayout extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'sasaran_id', 'indikator_id', 'target_kinerja', 'tw', 'target', 'satuan'
    ];

    public function data_sasaran()
    {
        return $this->belongsTo('App\PerjanjianKinerjaSasaran', 'sasaran_id', 'id');
    }

    public function data_indikator()
    {
        return $this->belongsTo('App\PerjanjianKinerjaIndikator', 'indikator_id', 'id');
    }
}
