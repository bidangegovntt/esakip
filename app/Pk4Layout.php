<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pk4Layout extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'kegiatan_id', 'indikator_id', 'target', 'sasaran'
    ];

    public function data_kegiatan()
    {
        return $this->belongsTo('App\Pk4Kegiatan', 'kegiatan_id', 'id');
    }

    public function data_indikator()
    {
        return $this->belongsTo('App\Pk4Indikator', 'indikator_id', 'id');
    }
}
