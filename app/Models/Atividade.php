<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Curso;
use App\Models\Usuario;

class Atividade extends Model
{
    use HasFactory;

    protected $table = 'atividade';
    public $timestamps = false;

    // Correção do $fillable
    protected $fillable = ['status'];

    public function curso(){
        return $this->belongsTo(Curso::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

}

