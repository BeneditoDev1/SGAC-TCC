<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Turma;
use App\Models\Curso;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuario';
    public $timestamps = false;

    public function curso(){
        return $this->belongsTo(Curso::class);
    }

    public function turma(){
        return $this->belongsTo(Turma::class);
    }

}
