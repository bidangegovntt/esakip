<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RenstraTujuan extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'renstra_id', 'deskripsi'
    ];

    public function data_renstra()
    {
        return $this->belongsTo('App\Renstra', 'renstra_id', 'id');
    }

    public function data_renstra_sasaran()
    {
        return $this->hasMany('App\RenstraSasaran', 'renstra_tujuan_id', 'id');
    }
}
