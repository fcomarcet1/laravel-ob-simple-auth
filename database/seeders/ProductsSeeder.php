<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('products')->insert([
                //'category_id' => $i,
                'category_id' => random_int(1, 10),
                'name' => 'Product ' . $i,
                'description' => 'Product ' . $i . ' description',
                'price' => random_int(1, 1000),
                'tax_percent' => random_int(1, 100),
                'stock' => random_int(1, 25),
                'created_at' => now('Europe/Madrid'),
                'updated_at' => now('Europe/Madrid'),
                'deleted_at' => null,
            ]);
        }
    }
}
