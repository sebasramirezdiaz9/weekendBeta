<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompraMedicamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra_medicamento', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('compra_id')->unsigned();
            $table->bigInteger('medicamento_id')->unsigned();
            $table->integer('cantidad');

            $table->foreign('compra_id')->references('id')->on('compras')->onDelete('cascade');
            $table->foreign('medicamento_id')->references('id')->on('medicamento')->onDelete('cascade');
            $table->softdeletes();
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
        Schema::dropIfExists('compra_medicamento');
    }
}
