<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class MedicineSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into medicamento (id, nombre, tipo_medicamento, presentacion, activo, precio_compra, precio_venta, created_at, updated_at) 
        values (?, ?, ?, ?, ?, ?, ?, ?, ?)', [1, 'Paracetamol Normon', 'Generico', 'Tableta 400 mg','Paracetamol', 120 ,100,Carbon::now()->format('Y-m-d H:i:s'),Carbon::now()->format('Y-m-d H:i:s')  ]);

        DB::insert('insert into medicamento (id, nombre, tipo_medicamento, presentacion, activo, precio_compra, precio_venta, created_at, updated_at) 
        values (?, ?, ?, ?, ?, ?, ?, ?, ?)', [2, 'Naproxeno Sodico', 'Generico', 'Tableta 100 mg','Naproxeno', 170 ,120,Carbon::now()->format('Y-m-d H:i:s'),Carbon::now()->format('Y-m-d H:i:s')  ]);

        DB::insert('insert into medicamento (id, nombre, tipo_medicamento, presentacion, activo, precio_compra, precio_venta, created_at, updated_at) 
        values (?, ?, ?, ?, ?, ?, ?, ?, ?)', [3, 'Bromuro de N-butilhioscina', 'Generico', 'Tableta 20 mg','Butilhioscinao', 220 ,150,Carbon::now()->format('Y-m-d H:i:s'),Carbon::now()->format('Y-m-d H:i:s')  ]);
    }
}
