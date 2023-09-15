<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function listar(){
        $usuarios = Usuario::orderBy('nome')->get();
        return view('listarUsuario', compact('usuarios'));
    }

    public function novo(){
        $usuario = new Usuario();
        $usuario->id = 0;
        return view('cadastroUsuario', compact('usuario'));
    }
}