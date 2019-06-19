<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pk4 extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tahun', 'opd_id', 'bidang_id', 'subbidang_id'
    ];

    public function data_kegiatan()
    {
        return $this->hasMany('App\Pk4Kegiatan', 'pk4_id', 'id');
    }

    public function data_opd()
    {
        return $this->belongsTo('App\Opd', 'opd_id', 'id');
    }

    public function data_bidang()
    {
        return $this->belongsTo('App\Bidang', 'bidang_id', 'id');
    }

    public function data_subbidang()
    {
        return $this->belongsTo('App\Subbidang', 'subbidang_id', 'id');
    }
}
