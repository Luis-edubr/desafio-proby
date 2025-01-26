@extends('layouts.dashboard')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <strong>Lista de Projetos</strong>
                <a href="{{ route('dashboard.create') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-plus"></i> Novo Projeto</a>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>Nome</th>
                                <th>Descrição</th>
                                <th>Status</th>
                                <th>Data de Criação</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->description }}</td>
                                    <td
                                        class="
                                    @if ($project->status == 'Pendente') bg-danger text-white
                                    @elseif ($project->status == 'Em Andamento') bg-warning text-white
                                    @elseif ($project->status == 'Concluído') bg-success text-white @endif
                                ">
                                        {{ $project->status }}</td>
                                    <td>{{ $project->start_date }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.show', $project->id) }}"><button
                                                class="btn btn-info btn-sm me-1">Visualizar</button></a>
                                        <a href="{{ route('dashboard.edit', $project->id) }}"><button
                                                class="btn btn-warning btn-sm me-1">Editar</button></a>

                                        <form action="{{ route('dashboard.destroy', $project->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm delete" type="submit">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        Exibindo {{ $projects->firstItem() }} a {{ $projects->lastItem() }} de
                        {{ $projects->total() }} registros
                    </div>
                    <nav aria-label="Paginação">
                        {{ $projects->links('vendor.pagination.default-pagination') }}
                    </nav>

                </div>
            </div>
        </div>
    </div>
@endsection
