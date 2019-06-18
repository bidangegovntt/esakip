<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pk3Program extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'pk3_id', 'deskripsi'
    ];

    public function data_pk3()
    {
        return $this->belongsTo('App\Pk3', 'pk3_id', 'id');
    }

    public function data_layout()
    {
        return $this->hasMany('App\Pk3Layout', 'program_id', 'id');
    }
}
