<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'curso';
    protected $fillable = ['nome', 'ano_inicio', 'ano_fim', 'horas'];
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(User::class, 'curso_user');
    }

}

