<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RealisasiAnggaran extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'rencana_anggaran_detail_id', 'capaian', 'hasil', 'anggaran'
    ];

    public function data_rencana_anggaran_detail()
    {
        return $this->belongsTo('App\RencanaAnggaranDetail', 'rencana_anggaran_detail_id', 'id');
    }
}
