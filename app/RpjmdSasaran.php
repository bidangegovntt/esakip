<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RpjmdSasaran extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'rpjmd_tujuan_id', 'deskripsi'
    ];

    public function data_rpjmd()
    {
        return $this->belongsTo('App\Rpjmd', 'rpjmd_id', 'id');
    }
}
