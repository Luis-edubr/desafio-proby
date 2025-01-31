<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            
               [ 'name' => 'Fernando Fagonde - Y',
                'email' => 'fernando@ipsillon.cc',
                'password' => bcrypt('fernandofagonde')],
                [
                'name' => 'Luis Eduardo - Y',
                'email' => 'moliveiraluiseduardo@gmail.com',
                'password' => bcrypt('luis123456')
                ]
            
            ]);

    }
}
