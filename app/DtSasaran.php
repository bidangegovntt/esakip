<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DtSasaran extends Model
{
    protected $fillable = [
        'nama'
    ];

    public function data_rencana_ppk()
    {
        return $this->hasMany('App\RencanaPpk', 'sasaran_id', 'id');
    }

    public function data_realisasi_ppk()
    {
        return $this->hasMany('App\RealisasiPpk', 'sasaran_id', 'id');
    }
}
