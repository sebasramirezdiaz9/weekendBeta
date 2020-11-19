<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamento', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',255);
            $table->string('presentacion',255);
            $table->string('activo',255);
            $table->integer('precio_compra');
            $table->integer('precio_venta');
            $table->bigInteger('tipo_medicamento_id')->unsigned();

            $table->foreign('tipo_medicamento_id')->references('id')->on('tipos_medicamento');
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
        Schema::dropIfExists('medicamento');
    }
}
