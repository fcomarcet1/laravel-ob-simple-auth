<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('categories')->insert([
                'name' => 'Category ' . $i,
                'description' => 'Category ' . $i . ' description',
                'created_at' => now('Europe/Madrid'),
                'updated_at' => now('Europe/Madrid'),
                'deleted_at' => null,
            ]);
        }
    }
}
