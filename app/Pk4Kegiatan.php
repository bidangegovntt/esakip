<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pk4Kegiatan extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'pk4_id', 'deskripsi'
    ];

    public function data_pk4()
    {
        return $this->belongsTo('App\Pk4', 'pk4_id', 'id');
    }

    public function data_layout()
    {
        return $this->hasMany('App\Pk4Layout', 'kegiatan_id', 'id');
    }
}
