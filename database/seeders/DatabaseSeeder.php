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
    public function run()
    {
        $this->call([
            // EmployeeSeeder::class,
            UsersSeeder::class,
            ProductSeeder::class,
        ]);

        // \App\Models\Product::factory(47)->create();
        \App\Models\User::factory(49)->create();
        \App\Models\Category::factory(5)->create();
        \App\Models\Post::factory(20)->create();
    }
}
