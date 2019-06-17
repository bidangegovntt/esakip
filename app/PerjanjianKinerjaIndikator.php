<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PerjanjianKinerjaIndikator extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'sasaran_id', 'deskripsi'
    ];

    public function data_sasaran()
    {
        return $this->belongsTo('App\PerjanjianKinerjaSasaran', 'sasaran_id', 'id');
    }
}
