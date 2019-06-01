<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RenstraIndikator extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'renstra_sasaran_id', 'deskripsi'
    ];

    public function data_renstra_sasaran()
    {
        return $this->belongsTo('App\RenstraSasaran', 'renstra_sasaran_id', 'id');
    }

    public function data_renstra_target()
    {
        return $this->hasMany('App\RenstraTarget', 'renstra_indikator_id', 'id');
    }
}
