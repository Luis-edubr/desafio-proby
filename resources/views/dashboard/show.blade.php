@extends('layouts.dashboard')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <strong>Detalhes do Projeto</strong>
            </div>
            <div class="card-body">
                <x-project-form :action="route('dashboard.show', $project->id)" :project="$project" readonly />
            </div>
        </div>
    </div>
@endsection
