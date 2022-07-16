<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SimpleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert([
            'id' => 1,
            'parent_unit' => 0,
            'unit_name' => 'Liter',
            'unit_rate' => 1
        ]);

        DB::table('units')->insert([
            'id' => 2,
            'parent_unit' => 0,
            'unit_name' => 'Kilo',
            'unit_rate' => 1
        ]);

        DB::table('units')->insert([
            'id' => 3,
            'parent_unit' => 1,
            'unit_name' => 'MiliLeter',
            'unit_rate' => 0.001
        ]);

        DB::table('units')->insert([
            'id' => 4,
            'parent_unit' => 2,
            'unit_name' => 'Gram',
            'unit_rate' => 0.001
        ]);

        DB::table('units')->insert([
            'id' => 5,
            'parent_unit' => 1,
            'unit_name' => 'Galon',
            'unit_rate' => 3.785
        ]);

        DB::table('units')->insert([
            'id' => 6,
            'parent_unit' => 2,
            'unit_name' => 'Pound',
            'unit_rate' => 0.453
        ]);

        DB::table('products')->insert([
            'id' => 1,
            'unit_id' => 2,
            'product_name' => 'Milk',
            'quantity' => 0
        ]);

        DB::table('products')->insert([
            'id' => 2,
            'unit_id' => 0,
            'product_name' => 'Coca Cola',
            'quantity' => 0
        ]);

        DB::table('product_quantities')->insert([
            'id' => 1,
            'product_id' => 1,
            'unit_id' => 5,
            'quantity' => 20
        ]);

        DB::table('product_quantities')->insert([
            'id' => 2,
            'product_id' => 1,
            'unit_id' => 1,
            'quantity' => 1
        ]);

        DB::table('product_quantities')->insert([
            'id' => 3,
            'product_id' => 1,
            'unit_id' => 3,
            'quantity' => 500
        ]);

        DB::table('product_quantities')->insert([
            'id' => 4,
            'product_id' => 2,
            'unit_id' => 3,
            'quantity' => 0
        ]);

        DB::table('product_quantities')->insert([
            'id' => 5,
            'product_id' => 2,
            'unit_id' => 1,
            'quantity' => 9
        ]);
    }
}
