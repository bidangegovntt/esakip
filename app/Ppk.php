<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ppk extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tahun', 'tahun_awal', 'tahun_akhir', 'opd_id'
    ];

    public function data_opd()
    {
        return $this->belongsTo('App\Opd', 'opd_id', 'id');
    }

    public function data_layout()
    {
        return $this->hasMany('App\PpkLayout', 'ppk_id', 'id');
    }
}
