@extends('layouts.dashboard')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <strong>Editar Projeto</strong>
            </div>
            <div class="card-body">
                <x-error-messages />
                <x-project-form :action="route('dashboard.update', $project->id)" method="PATCH" :project="$project" />
            </div>
            <div class="card-header bg-primary text-white">
                <strong>Documentos já inseridos no Projeto</strong>
            </div><br />
            <div class="card-body">
                <x-documents :documents="$documents" />
            </div>
        </div>
    </div>
@endsection
