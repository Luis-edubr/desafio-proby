<?php

namespace Database\Seeders;

use Database\Seeders\UserSeeder;
use Database\Seeders\ProjectsSeeder;
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
            ProjectsSeeder::class,
            UserSeeder::class
        ]);
    }
}
