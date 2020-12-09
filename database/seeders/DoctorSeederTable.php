<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DoctorSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into doctores (id, name, ape_pat, ape_mat, telefono, universidad, cedula_profesional, user_id ,created_at, updated_at) 
        values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [1, 'Gregory', 'House', 'Martinez','4491025178', 'UAA', '0123456789', 1 ,Carbon::now()->format('Y-m-d H:i:s'),Carbon::now()->format('Y-m-d H:i:s')  ]);
    }
}
