<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    use HasFactory;

    protected $table = 'atividade';
    public $timestamps = false;

    public function curso(){
        return $this->belongsTo(Curso::class, 'curso');
    }

    public function usuario(){
        return $this->belongsTo(Usuario::class, 'usuario');
    }
}