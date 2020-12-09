<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class RecetasStatusSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into estado_receta (id, nombre, created_at, updated_at) 
        values (?, ?, ?, ?)', [1, 'Prescrita', Carbon::now()->format('Y-m-d H:i:s'),Carbon::now()->format('Y-m-d H:i:s')  ]);

        DB::insert('insert into estado_receta (id, nombre, created_at, updated_at) 
        values (?, ?, ?, ?)', [2, 'Surtida', Carbon::now()->format('Y-m-d H:i:s'),Carbon::now()->format('Y-m-d H:i:s')  ]);
    }
}
