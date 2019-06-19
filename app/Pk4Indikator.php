<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pk4Indikator extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'deskripsi'
    ];
}
