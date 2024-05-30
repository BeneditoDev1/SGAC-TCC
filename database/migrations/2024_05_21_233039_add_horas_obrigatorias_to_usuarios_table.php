<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHorasObrigatoriasToUsuariosTable extends Migration
{
    public function up()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->integer('horas_obrigatorias')->default(0); // Adiciona a coluna horas_obrigatorias com valor padrão 0
        });
    }

    public function down()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropColumn('horas_obrigatorias');
        });
    }
}

