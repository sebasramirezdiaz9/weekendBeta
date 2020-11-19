<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicamentoRecetaMedicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamento_receta_medica', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('medicamento_id')->unsigned();
            $table->bigInteger('receta_medica_id')->unsigned();
            $table->string('instrucciones');

            $table->foreign('medicamento_id')->references('id')->on('medicamento')->onDelete('cascade');
            $table->foreign('receta_medica_id')->references('id')->on('recetas_medicas')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicamento_receta_medica');
    }
}
