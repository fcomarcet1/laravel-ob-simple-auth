<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('products')->insert([
                //'category_id' => $i,
                'role' => 'User',
                'level' => 1, //User
                'created_at' => now('Europe/Madrid'),
                'updated_at' => now('Europe/Madrid'),
                'deleted_at' => null,
         ]);
        }
    }
}
