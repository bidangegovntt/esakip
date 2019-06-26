<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RencanaAnggaran extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tahun', 'opd_id'
    ];

    public function data_opd()
    {
        return $this->belongsTo('App\Opd', 'opd_id', 'id');
    }
}
