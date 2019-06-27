<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RencanaAnggaranDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'rencana_anggaran_layout_id', 'program', 'kegiatan', 'indikator_kegiatan', 'target', 'satuan', 'anggaran'
    ];

    public function data_layout()
    {
        return $this->belongsTo('App\RencanaAnggaranLayout', 'rencana_anggaran_layout_id', 'id');
    }
}
