<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PejabatOpd extends Model
{
    protected $fillable = [
        'nip', 'nama', 'opd_id', 'jabatan_id', 'email', 'no_telp', 'alamat'
    ];

    public function data_opd() {
        return $this->belongsTo('App\Opd', 'opd_id', 'id');
    }

    public function data_jabatan() {
        return $this->belongsTo('App\JabatanOpd', 'jabatan_id', 'id');
    }
}
