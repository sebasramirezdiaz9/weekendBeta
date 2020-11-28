<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecetasMedicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recetas_medicas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cita_id')->unsigned();
            $table->bigInteger('estado_receta_id')->unsigned();
            $table->timestamps();
            $table->softdeletes();
            $table->foreign('cita_id')->references('id')->on('citas')->onDelete('cascade');
            $table->foreign('estado_receta_id')->references('id')->on('estado_receta')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recetas_medicas');
    }
}
