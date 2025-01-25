<?php

namespace Database\Seeders;

use App\Models\Projects;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Projects::insert([
            [
                'name' => 'Projeto 1',
                'description' => 'Descrição do Projeto 1',
                'start_date' => '2023-01-01',
                'status' => 'Pendente',
            ],
            [
                'name' => 'Projeto 2',
                'description' => 'Descrição do Projeto 2',
                'start_date' => '2023-02-01',
                'status' => 'Em Andamento',
            ],
            [
                'name' => 'Projeto 3',
                'description' => 'Descrição do Projeto 3',
                'start_date' => '2023-03-01',
                'status' => 'Concluído',
            ],
            [
                'name' => 'Projeto 4',
                'description' => 'Descrição do Projeto 4',
                'start_date' => '2023-04-01',
                'status' => 'Pendente',
            ],
            [
                'name' => 'Projeto 5',
                'description' => 'Descrição do Projeto 5',
                'start_date' => '2023-05-01',
                'status' => 'Em Andamento',
            ],
        ]);
    }
}
