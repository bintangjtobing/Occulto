<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class occulterDB extends Model
{
    protected $table = 'occulter';
    protected $fillable = [
        'name'
    ];
}
