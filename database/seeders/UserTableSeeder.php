<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id'                => '1',
            'name'              => 'Administrator',
            'email'             => 'admin@email.com',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'password'          => bcrypt('admin'),
            'status'            => true,
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}
