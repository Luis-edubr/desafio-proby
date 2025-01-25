@extends('layouts.dashboard')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <strong>Novo Projeto</strong>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.store') }}" id="projectCreateForm" method="POST">
                @csrf
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Digite o nome do projeto" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Descrição</label>
                        <textarea class="form-control" id="description" name="description"
                            placeholder="Digite a descrição do projeto" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="Pendente">Pendente</option>
                            <option value="Em andamento">Em andamento</option>
                            <option value="Concluído">Concluido</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="start_date" class="form-label">Data de início</label>
                        <input type="text" id="start_date" name="start_date" class="form-control"
                            placeholder="YYYY-MM-DD" required>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Salvar</button>
                        <button type="reset" class="btn btn-secondary">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
