<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RealisasiKinerja extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'indikator_kinerja_id', 'tw', 'target', 'capaian', 'hasil', 'keterangan', 'lampiran'
    ];

    public function data_kinerja_indikator()
    {
        return $this->belongsTo('App\PpkLayout', 'indikator_kinerja_id', 'indiaktor_id');
    }
}
