<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAnoInicioAndAnoFimToDateInCursoTable extends Migration
{
    public function up()
    {
        Schema::table('curso', function (Blueprint $table) {
            $table->date('ano_inicio')->change();
            $table->date('ano_fim')->change();
        });
    }

    public function down()
    {
        Schema::table('curso', function (Blueprint $table) {
            $table->integer('ano_inicio')->change();
            $table->integer('ano_fim')->change();
        });
    }
}
