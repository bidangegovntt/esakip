<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IkuLayout extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'sasaran_id', 'indikator_id', 'penjelasan', 'penanggung_jawab'
    ];

    public function data_sasaran()
    {
        return $this->belongsTo('App\IkuSasaran', 'sasaran_id', 'id');
    }

    public function data_indikator()
    {
        return $this->belongsTo('App\IkuIndikator', 'indikator_id', 'id');
    }
}
