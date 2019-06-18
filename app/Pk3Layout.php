<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pk3Layout extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'program_id', 'indikator_id', 'target_program', 'sasaran_program'
    ];

    public function data_program()
    {
        return $this->belongsTo('App\Pk3Program', 'program_id', 'id');
    }

    public function data_indikator()
    {
        return $this->belongsTo('App\Pk3Indikator', 'indikator_id', 'id');
    }
}
