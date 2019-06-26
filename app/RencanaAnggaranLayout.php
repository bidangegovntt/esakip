<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RencanaAnggaranLayout extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'rencana_anggaran_id', 'sasaran_id', 'indikator_kinerja_id', 'program', 'kegiatan', 'indikator_kegiatan', 'target', 'satuan', 'anggaran'
    ];

    public function data_rencana_anggaran()
    {
        return $this->belongsTo('App\RencanaAnggaran', 'rencana_anggaran_id', 'id');
    }

    public function data_sasaran()
    {
        return $this->belongsTo('App\Sasaran', 'sasaran_id', 'id');
    }

    public function data_indikator_kinerja()
    {
        return $this->belongsTo('App\IndikatorKinerja', 'indikator_kinerja_id', 'id');
    }
}
