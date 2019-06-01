<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RenstraLayout extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tujuan_id', 'sasaran_id', 'indikator_id'
    ];

    public function data_target()
    {
        return $this->hasMany('App\RenstraTarget', 'renstra_indikator_id', 'id');
    }
    
    public function data_tujuan()
    {
        return $this->belongsTo('App\RenstraTujuan', 'tujuan_id', 'id');
    }

    public function data_sasaran()
    {
        return $this->belongsTo('App\RenstraSasaran', 'sasaran_id', 'id');
    }

    public function data_indikator()
    {
        return $this->belongsTo('App\RenstraIndikator', 'indikator_id', 'id');
    }
}
