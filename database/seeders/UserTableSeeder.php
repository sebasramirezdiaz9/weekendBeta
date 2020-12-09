<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into users (id, name, email, email_verified_at, password, status, created_at, updated_at) 
        values (?, ?, ?, ?, ?, ?, ?, ?)', [1, 'Administrator', 'admin@email.com', Carbon::now()->format('Y-m-d H:i:s'),bcrypt('12345678'), true, Carbon::now()->format('Y-m-d H:i:s'), Carbon::now()->format('Y-m-d H:i:s') ]);

    }
}
