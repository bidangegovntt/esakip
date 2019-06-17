<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PerjanjianKinerjaSasaran extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'perjanjian_kinerja_id', 'deskripsi'
    ];

    public function data_perjanjian_kinerja()
    {
        return $this->belongsTo('App\PerjanjianKinerja', 'perjanjian_kinerja_id', 'id');
    }

    public function data_indikator()
    {
        return $this->hasMany('App\PerjanjianKinerjaIndikator', 'sasaran_id', 'id');
    }

    public function data_layout()
    {
        return $this->hasMany('App\PerjanjianKinerjaLayout', 'sasaran_id', 'id');
    }
}
