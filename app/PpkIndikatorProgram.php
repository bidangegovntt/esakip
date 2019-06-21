<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PpkIndikatorProgram extends Model
{
    use SoftDeletes;

    protected $fillable = [

    ];

    public function data_program()
    {
        return $this->belongsTo('App\PpkProgram', 'ppk_program_id', 'id');
    }
}
