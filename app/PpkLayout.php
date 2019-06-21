<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PpkLayout extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'ppk_id', 'sasaran_id', 'indikator_id', 'target_kinerja_id'
    ];

    public function data_program()
    {
        return $this->hasMany('App\PpkProgram', 'ppk_layout_id', 'id');
    }
}
