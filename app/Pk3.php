<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pk3 extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tahun', 'opd_id', 'bidang_id'
    ];

    public function data_program()
    {
        return $this->hasMany('App\Pk3Program', 'pk3_id', 'id');
    }

    public function data_opd()
    {
        return $this->belongsTo('App\Opd', 'opd_id', 'id');
    }

    public function data_bidang()
    {
        return $this->belongsTo('App\Bidang', 'bidang_id', 'id');
    }
}
