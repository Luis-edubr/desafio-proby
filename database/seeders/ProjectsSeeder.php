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
                'start_date' => '2025-01-01',
                'status' => 'Pendente',
            ],
            [
                'name' => 'Projeto 2',
                'description' => 'Descrição do Projeto 2',
                'start_date' => '2025-02-01',
                'status' => 'Em Andamento',
            ],
            [
                'name' => 'Projeto 3',
                'description' => 'Descrição do Projeto 3',
                'start_date' => '2025-03-01',
                'status' => 'Concluído',
            ],
            [
                'name' => 'Projeto 4',
                'description' => 'Descrição do Projeto 4',
                'start_date' => '2025-04-01',
                'status' => 'Pendente',
            ],
            [
                'name' => 'Projeto 5',
                'description' => 'Descrição do Projeto 5',
                'start_date' => '2025-05-01',
                'status' => 'Em Andamento',
            ],
            [
                'name' => 'Projeto 6',
                'description' => 'Descrição do Projeto 6',
                'start_date' => '2025-06-01',
                'status' => 'Em Andamento',
            ],
            [
                'name' => 'Projeto 7',
                'description' => 'Descrição do Projeto 7',
                'start_date' => '2025-07-01',
                'status' => 'Em Andamento',
            ],
            [
                'name' => 'Projeto 8',
                'description' => 'Descrição do Projeto 8',
                'start_date' => '2025-08-01',
                'status' => 'Em Andamento',
            ],
            [
                'name' => 'Projeto 9',
                'description' => 'Descrição do Projeto 9',
                'start_date' => '2025-09-01',
                'status' => 'Em Andamento',
            ],
            [
                'name' => 'Projeto 10',
                'description' => 'Descrição do Projeto 10',
                'start_date' => '2025-10-01',
                'status' => 'Em Andamento',
            ],
        ]);
    }
}
