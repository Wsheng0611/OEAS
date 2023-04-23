<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([

            /** parend_id - used to define product category
             *  if id = null, top level
             *  if id = x null, it will under top level 
             */

            [
                'parent_id' => null,
                'name' => 'Home Appliances',
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'parent_id' => 1,
                'name' => 'Laundry Appliances',
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now() 
            ],
            [
                'parent_id' => 1,
                'name' => 'Cleaning Appliances',
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now() 
            ],
            [
                'parent_id' => 1,
                'name' => 'Heating & Cooling Appliances',
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now() 
            ],
            [
                'parent_id' => null,
                'name' => 'Kitchen Appliances',
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now() 
            ],
            [
                'parent_id' => 3,
                'name' => 'Refrigerators',
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now() 
            ],
            [
                'parent_id' => 3,
                'name' => 'Ovens',
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now() 
            ],
            [
                'parent_id' => 3,
                'name' => 'Cookers',
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now() 
            ],
        ]);
    }
}
