<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHorasToCursosTable extends Migration
{
    public function up()
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->integer('horas')->default(0); // Adiciona a coluna horas com valor padrão 0
        });
    }

    public function down()
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->dropColumn('horas');
        });
    }
}

