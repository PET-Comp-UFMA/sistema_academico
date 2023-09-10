<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{ 
    protected $table = 'aluno';
    protected $fillable = [
        'user_id',
        'escola_id',
    ];

    // Defina o relacionamento com a tabela Usuario
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function school()
    {
        return $this->belongsTo(School::class, 'escola_id');
    }
}

