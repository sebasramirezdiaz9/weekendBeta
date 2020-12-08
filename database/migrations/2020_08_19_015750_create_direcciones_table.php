<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE TABLE `direcciones` (
            `id` bigint(20) UNSIGNED NOT NULL PRIMARY KEY,
            `calle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
            `colonia` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
            `num_ext` int(11) NOT NULL,
            `num_int` int(11) DEFAULT NULL,
            `codigo_postal` int(11) NOT NULL,
            `deleted_at` timestamp NULL DEFAULT NULL,
            `created_at` timestamp NULL DEFAULT NULL,
            `updated_at` timestamp NULL DEFAULT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
          ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direcciones');
    }
}
