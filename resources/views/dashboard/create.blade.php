@extends('layouts.dashboard')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <strong>Novo Projeto</strong>
            </div>
            <div class="card-body">
                <x-error-messages />
                <x-project-form :action="route('dashboard.store')" />
            </div>
        </div>
    </div>
@endsection
