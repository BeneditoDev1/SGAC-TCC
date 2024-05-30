<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCursosTable extends Migration
{
    public function up()
    {
        Schema::table('curso', function (Blueprint $table) {
            $table->integer('ano_inicio')->nullable();
            $table->integer('ano_fim')->nullable();
        });
    }

    public function down()
    {
        Schema::table('curso', function (Blueprint $table) {
            $table->dropColumn(['ano_inicio', 'ano_fim']);
        });
    }
}
