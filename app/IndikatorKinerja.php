<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndikatorKinerja extends Model
{
    protected $fillable = [
        'deskripsi', 'target_kinerja'
    ];
}
