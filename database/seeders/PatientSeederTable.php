<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PatientSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into pacientes (id, name, ape_pat, ape_mat, telefono, genero, fecha_nacimiento, created_at, updated_at) 
        values (?, ?, ?, ?, ?, ?, ?, ?, ?)', [1, 'Sebastián', 'Ramírez', 'Díaz', '4491025178','Masculino',  Carbon::create(1998, 12, 9,), Carbon::now()->format('Y-m-d H:i:s'),Carbon::now()->format('Y-m-d H:i:s')  ]);
    }
}
