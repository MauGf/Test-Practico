<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriasGradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias_grados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('grd_grado_id')->unsigned();
            $table->foreignId('mat_materia_id')->unsigned();
            $table->timestamps();

            $table->foreign('grd_grado_id')->references('id')->on('grd_grados');
            $table->foreign('mat_materia_id')->references('id')->on('mat_materias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materias_grados');
    }
}
