<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users'; // Nome da tabela

    public $timestamps = false;

    public function curso()
    {
    return $this->belongsTo(Curso::class);
    }

    public function turma()
    {
    return $this->belongsTo(Turma::class);
    }

    public function cursos()
    {
    return $this->belongsToMany(Curso::class, 'curso_user');
    }

    public function turmas()
    {
    return $this->belongsToMany(Turma::class, 'turma_user');
    }

    protected $primaryKey = 'id';

    protected $unique = ['cpf'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
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
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'data_ativacao' => 'datetime:Y-m-d',
    ];

    public function atividade()
    {
        return $this->hasMany(Atividade::class);
    }

    public function atividades()
    {
        return $this->hasMany(Atividade::class, 'usuario_id');
    }
}
