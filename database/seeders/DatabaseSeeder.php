<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(DoctorSeederTable::class);
        $this->call(MedicineSeederTable::class);
        $this->call(PatientSeederTable::class);
        $this->call(RecetasStatusSeederTable::class);
    }
}
