<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IkuIndikator extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'sasaran_id', 'deskripsi'
    ];

    public function data_sasaran()
    {
        return $this->belongsTo('App\IkuSasaran', 'sasaran_id', 'id');
    }
}
