<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PpkIndikatorKinerjaDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'indikator_kinerja_id', 'program', 'anggaran_program', 'indikator_program', 'target_program'
    ];

    public function data_indikator_kinerja()
    {
        return $this->belongsTo('App\PpkIndikatorKinerja', 'indikator_kinerja_id', 'id');
    }
}
