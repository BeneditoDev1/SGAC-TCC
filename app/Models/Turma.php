<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Curso;

class Turma extends Model
{
    use HasFactory;

    protected $table = 'turma';
    public $timestamps = false;

    public function curso(){
        return $this->belongsTo(Curso::class);
    }

}
