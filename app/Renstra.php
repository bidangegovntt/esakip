<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Renstra extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tahun_awal', 'tahun_akhir', 'opd_id'
    ];

    public function data_renstra_tujuan()
    {
        return $this->hasMany('App\RenstraTujuan', 'renstra_id', 'id');
    }

    public function data_opd()
    {
        return $this->belongsTo('App\Opd', 'opd_id', 'id');
    }
}
