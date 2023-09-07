<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $table = 'usuario';
    public $timestamps = false;

    public function curso(){
        return $this->belongsTo(Curso::class, 'curso');
    }

}
