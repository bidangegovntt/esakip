<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RpjmdTujuan extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'rpjmd_id', 'deskripsi'
    ];

    public function data_rpjmd()
    {
        return $this->belongsTo('App\Rpjmd', 'rpjmd_id', 'id');
    }

    public function data_rpjmd_sasaran()
    {
        return $this->hasMany('App\RpjmdSasaran', 'rpjmd_tujuan_id', 'id');
    }

    public function data_layout()
    {
        return $this->hasMany('App\RpjmdLayout', 'tujuan_id', 'id');
    }
}
