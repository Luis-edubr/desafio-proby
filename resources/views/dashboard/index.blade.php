@extends('layouts.dashboard')

@section('content')

<div class="container mt-4">
  <div class="card">
    <div class="card-header bg-primary text-white">
      <strong>Lista de Dados</strong>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead class="table-dark">
            <tr>
              <th>Nome</th>
              <th>Email</th>
              <th>Status</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>João Silva</td>
              <td>joao@email.com</td>
              <td>Ativo</td>
              <td>
                <button class="btn btn-info btn-sm me-1">Visualizar</button>
                <button class="btn btn-warning btn-sm me-1">Editar</button>
                <button class="btn btn-danger btn-sm">Excluir</button>
              </td>
            </tr>
            <tr>
              <td>Maria Santos</td>
              <td>maria@email.com</td>
              <td>Inativo</td>
              <td>
                <button class="btn btn-info btn-sm me-1">Visualizar</button>
                <button class="btn btn-warning btn-sm me-1">Editar</button>
                <button class="btn btn-danger btn-sm">Excluir</button>
              </td>
            </tr>
            <tr>
              <td>Carlos Oliveira</td>
              <td>carlos@email.com</td>
              <td>Ativo</td>
              <td>
                <button class="btn btn-info btn-sm me-1">Visualizar</button>
                <button class="btn btn-warning btn-sm me-1">Editar</button>
                <button class="btn btn-danger btn-sm">Excluir</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


@endsection