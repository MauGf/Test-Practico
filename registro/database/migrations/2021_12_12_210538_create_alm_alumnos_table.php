<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlmAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alm_alumnos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('alm_codigo', 100);
            $table->char('alm_nombre', 200);
            $table->integer('alm_edad');
            $table->char('alm_sexo', 100);
            $table->foreignId('grd_id');
            $table->char('alm_observacion', 200)->nullable();
            $table->timestamps();
            
            $table->foreign('grd_id')->references('id')->on('grd_grados');
 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alm_alumnos');
    }
}
