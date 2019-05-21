<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RencanaStrategi extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'opd_id', 
        'tahun', 
        'tujuan', 
        'sasaran', 
        'indikator_kinerja', 
        'awal', 
        'perubahan', 
        'created_by', 
        'updated_by', 
        'deleted_by'
    ];

    public function data_opd() {
        return $this->belongsTo('App\Opd', 'opd_id', 'id');
    }
}
