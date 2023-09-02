<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{   
    protected $table = 'escola';
    protected $fillable = [
        'nome',
        'endereco',
    ];
   
}
