<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PejabatSubbidang extends Model
{
    protected $fillable = [
        'nip', 'nama', 'opd_id', 'bidang_id', 'subbidang_id', 'jabatan_id'
    ];

    public function data_opd()
    {
        return $this->belongsTo('App\Opd', 'opd_id', 'id');
    }

    public function data_bidang()
    {
        return $this->belongsTo('App\Bidang', 'bidang_id', 'id');
    }

    public function data_subbidang()
    {
        return $this->belongsTo('App\Subbidang', 'subbidang_id', 'id');
    }

    public function data_jabatan()
    {
        return $this->belongsTo('App\JabatanOpd', 'jabatan_id', 'id');
    }
}
