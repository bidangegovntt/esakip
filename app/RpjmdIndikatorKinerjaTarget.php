<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RpjmdIndikatorKinerjaTarget extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'rpjmd_indikator_id', 'tahun', 'nilai'
    ];
    
    public function data_rpjmd()
    {
        return $this->belongsTo('App\Rpjmd', 'rpjmd_id', 'id');
    }
}
