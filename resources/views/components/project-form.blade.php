@props(['action', 'method' => 'POST', 'project' => null, 'readonly' => false])

<form action="{{ $action }}" method="POST" id="projectForm" enctype="multipart/form-data">
    @csrf
    @if (in_array($method, ['PUT', 'PATCH', 'DELETE']))
        @method($method)
    @endif

    <div class="mb-3">
        <label for="Nome" class="form-label">Nome</label>
        <input type="text" class="form-control" id="Nome" name="Nome" placeholder="Digite o nome do projeto"
            value="{{ old('Nome', $project->name ?? '') }}" {{ $readonly ? 'readonly' : '' }} required>
    </div>

    <div class="mb-3">
        <label for="Descrição" class="form-label">Descrição</label>
        <textarea class="form-control" id="Descrição" name="Descrição" placeholder="Digite a descrição do projeto"
            {{ $readonly ? 'readonly' : '' }} required>{{ old('Descrição', $project->description ?? '') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="Status" class="form-label">Status</label>
        <select class="form-select" id="Status" name="Status" {{ $readonly ? 'disabled' : '' }}>
            <option value="Pendente" {{ old('Status', $project->status ?? '') == 'Pendente' ? 'selected' : '' }}>
                Pendente</option>
            <option value="Em andamento"
                {{ old('Status', $project->status ?? '') == 'Em andamento' ? 'selected' : '' }}>Em andamento</option>
            <option value="Concluído" {{ old('Status', $project->status ?? '') == 'Concluído' ? 'selected' : '' }}>
                Concluído</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="Data de início" class="form-label">Data de início</label>
        <input type="text" id="start_date" name="Data" class="form-control" placeholder="YYYY-MM-DD"
            value="{{ old('Data de início', $project->start_date ?? '') }}" {{ $readonly ? 'readonly' : '' }} required>
    </div>

    @unless ($readonly)
        <div class="mb-3">
            <label for="Documento" id="fileInputsContainer" class="form-label">Documentos</label>
            <input type="file" class="form-control" id="Documento" name="Documento[]" multiple {{ $readonly ? 'disabled' : '' }}>
            <p class="form-text text-muted">Você pode selecionar múltiplos arquivos.</p>
        </div>
            <button type="button" class="btn btn-outline-secondary mb-2" id="addFileInput">Adicionar outro arquivo</button>
        <div class="text-end">
            <button type="submit" class="btn btn-success">Salvar</button>
            
        </div>
    @endunless
    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancelar</a>
</form>
