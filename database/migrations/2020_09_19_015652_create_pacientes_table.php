<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('ape_mat',255);
            $table->string('ape_pat',255);
            $table->string('telefono',255);
            $table->date('fecha_nacimiento');
            $table->bigInteger('direccion_id')->unsigned();
            $table->bigInteger('expediente_id')->unsigned();

            $table->foreign('direccion_id')->references('id')->on('direcciones')->onDelete('cascade');
            $table->foreign('expediente_id')->references('id')->on('expedientes')->onDelete('cascade');

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
        Schema::dropIfExists('pacientes');
    }
}
