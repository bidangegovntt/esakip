<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PpkIndikatorKinerja extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'deskripsi', 'target_kinerja'
    ];

    public function data_layout()
    {
        return $this->hasMany('App\PpkLayout', 'indikator_id', 'id');
    }

    public function data_indikator()
    {
        return $this->hasMany('App\PpkIndikatorKinerjaDetail', 'indikator_kinerja_id', 'id');
    }
}
