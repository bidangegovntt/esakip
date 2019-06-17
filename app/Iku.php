<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Iku extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tahun_awal', 'tahun_akhir', 'opd_id'
    ];

    public function data_sasaran()
    {
        return $this->hasMany('App\IkuSasaran', 'iku_id', 'id');
    }

    public function data_opd()
    {
        return $this->belongsTo('App\Opd', 'opd_id', 'id');
    }
}
