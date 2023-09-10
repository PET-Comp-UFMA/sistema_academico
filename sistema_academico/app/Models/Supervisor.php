<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
   
    protected $table = 'supervisor';
    protected $fillable = [
        'professor_id'
    ];

    // Defina o relacionamento com a tabela Usuario
    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'professor_id');
    }
}
