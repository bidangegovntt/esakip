<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RenstraSasaran extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'renstra_tujuan_id', 'deskripsi'
    ];

    public function data_renstra_tujuan()
    {
        return $this->belongsTo('App\RenstraTujuan', 'renstra_tujuan_id', 'id');
    }

    public function data_renstra_indikator()
    {
        return $this->hasMany('App\RenstraIndikator', 'renstra_sasaran_id', 'id');
    }
}
