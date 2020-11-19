<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicamentoVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamento_venta', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('medicamento_id')->unsigned();
            $table->bigInteger('venta_id')->unsigned();
            $table->integer('cantidad');

            $table->foreign('medicamento_id')->references('id')->on('medicamento')->onDelete('cascade');
            $table->foreign('venta_id')->references('id')->on('ventas')->onDelete('cascade');
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
        Schema::dropIfExists('medicamento_venta');
    }
}
