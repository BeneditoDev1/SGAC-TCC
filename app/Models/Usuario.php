<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; // Para suporte de autenticação
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'usuario'; // Corrigido o nome da tabela para plural
    public $timestamps = false;

    public function curso(){
        return $this->belongsTo(Curso::class);
    }

    public function turma(){
        return $this->belongsTo(Turma::class);
    }

    protected $fillable = [
        'nome',
        'cpf',
        'matricula',
        'sexo',
        'data_ativacao',
        'semestre',
        'ra',
        'curso_id',
        'horas_obrigatorias',
        'turma_id',
        'email',
        'password',
        'tipo_usuario',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
