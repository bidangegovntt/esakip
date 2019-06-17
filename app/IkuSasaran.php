<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IkuSasaran extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'iku_id', 'deskripsi'
    ];

    public function data_iku()
    {
        return $this->belongsTo('App\Iku', 'iku_id', 'id');
    }

    public function data_indikator()
    {
        return $this->hasMany('App\IkuIndikator', 'sasaran_id', 'id');
    }

    public function data_layout()
    {
        return $this->hasMany('App\IkuLayout', 'sasaran_id', 'id');
    }
}
