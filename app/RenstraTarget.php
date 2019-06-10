<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RenstraTarget extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'renstra_indikator_id', 'tahun', 'nilai'
    ];

    public function data_indikator()
    {
        return $this->belongsTo('App\RenstraIndikator', 'renstra_indikator_id', 'id');
    }
}
