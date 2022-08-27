<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            ProductsSeeder::class,
            CategorySeeder::class,
        ]);


        /* \App\Models\User::factory()->create([
           'name' => 'Admin',
           'email' => 'admin@admin.com'
        ]);
        \App\Models\User::factory()->create([
            'name' => 'fcomarcet1',
            'email' => 'fcoomarcet1@gmail.com'
        ]);*/

        // \App\Models\User::factory(8)->create();


    }
}
