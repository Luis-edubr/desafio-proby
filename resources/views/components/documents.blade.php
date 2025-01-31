@props([
    'documents' => [],
    'title' => 'Lista de Documentos',
    'readonly' => false
])
<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nome do Arquivo</th>
                <th>Data de Criação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($documents as $document)
                <tr>
                    <td>
                        @if (Str::endsWith($document->file_name, ['.doc', '.docx']))
                            <i class="bi bi-file-earmark-word"></i>
                        @elseif (Str::endsWith($document->file_name, ['.pdf']))
                            <i class="bi bi-file-earmark-pdf"></i>
                        @elseif (Str::endsWith($document->file_name, ['.jpg', '.jpeg', '.png']))
                            <i class="bi bi-file-earmark-image"></i>
                        @else
                            <i class="bi bi-file-earmark"></i>
                        @endif
                    </td>
                    <td>{{ $document->file_name }}</td>
                    <td>{{ $document->created_at }}</td>
                    <td>
                        <a
                            href="{{ route('documents.download', $document->id) }}"class="btn btn-success btn-sm">Download</a>
                        @unless ($readonly)
                            <form action="{{ route('documents.destroy', $document->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm delete">Excluir</button>
                            </form>
                        @endunless
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Nenhum documento encontrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
