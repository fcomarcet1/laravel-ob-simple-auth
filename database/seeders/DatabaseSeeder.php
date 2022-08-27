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
        // With seeders
        /* $this->call([
            ProductsSeeder::class,
            CategorySeeder::class,
        ]); */

        // With factories
        \App\Models\User::factory(5)->create();
        \App\Models\User::factory(5)->unverified()->create();
    }
}
