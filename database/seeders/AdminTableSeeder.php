<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'role_id' => 2,
                'username' => 'Bossku',
                'email' => 'boss@neptune.com',
                'password' => Hash::make('123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_id' => 3,
                'username' => 'Staff_1',
                'email' => 'staff_one@neptune.com',
                'password' => Hash::make('123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
