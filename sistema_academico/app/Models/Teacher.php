<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
   
    protected $table = 'professor';
    protected $fillable = [
        'user_id',
    ];

    // Defina o relacionamento com a tabela Usuario
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
