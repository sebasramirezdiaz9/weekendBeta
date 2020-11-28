<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallesPagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalles_pago', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cita_id')->unsigned();
            $table->integer('total_pago');
            $table->bigInteger('metodo_pago_id')->unsigned();

            $table->timestamps();
            $table->softdeletes();
            $table->foreign('cita_id')->references('id')->on('citas')->onDelete('cascade');
            $table->foreign('metodo_pago_id')->references('id')->on('metodos_pago')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalles_pago');
    }
}
