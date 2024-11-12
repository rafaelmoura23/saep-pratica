@extends('layouts.app')

@section('content')
    <h1>Gerenciamento de Tarefas</h1>

    <div class="row">
        <!-- Coluna A Fazer -->
        <div class="col-md-4">
            <h3 class="text-center">A Fazer</h3>
            <div>
                @foreach ($tarefas as $tarefa)
                    @if ($tarefa->status == 'a fazer')
                        <div class="card mb-3 p-3 border">
                            <h5>{{ $tarefa->descricao }}</h5>
                            <p><strong>Status:</strong> {{ $tarefa->status }}</p>
                            <p><strong>Prioridade:</strong> {{ $tarefa->prioridade }}</p>
                            <p><strong>Setor:</strong> {{ $tarefa->setor }}</p>
                            <p><strong>Usuário:</strong> {{ $tarefa->usuario->nome }}</p>
                            <div class="d-flex justify-content-start">
                                <a href="{{ route('tarefas.edit', $tarefa->id) }}" class="btn btn-warning me-2">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir essa tarefa?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash"></i> Excluir
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- Coluna Fazendo -->
        <div class="col-md-4">
            <h3 class="text-center">Fazendo</h3>
            <div>
                @foreach ($tarefas as $tarefa)
                    @if ($tarefa->status == 'fazendo')
                        <div class="card mb-3 p-3 border">
                            <h5>{{ $tarefa->descricao }}</h5>
                            <p><strong>Status:</strong> {{ $tarefa->status }}</p>
                            <p><strong>Prioridade:</strong> {{ $tarefa->prioridade }}</p>
                            <p><strong>Setor:</strong> {{ $tarefa->setor }}</p>
                            <p><strong>Usuário:</strong> {{ $tarefa->usuario->nome }}</p>
                            <div class="d-flex justify-content-start">
                                <a href="{{ route('tarefas.edit', $tarefa->id) }}" class="btn btn-warning me-2">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir essa tarefa?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash"></i> Excluir
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- Coluna Pronto -->
        <div class="col-md-4">
            <h3 class="text-center">Pronto</h3>
            <div>
                @foreach ($tarefas as $tarefa)
                    @if ($tarefa->status == 'pronto')
                        <div class="card mb-3 p-3 border">
                            <h5>{{ $tarefa->descricao }}</h5>
                            <p><strong>Status:</strong> {{ $tarefa->status }}</p>
                            <p><strong>Prioridade:</strong> {{ $tarefa->prioridade }}</p>
                            <p><strong>Setor:</strong> {{ $tarefa->setor }}</p>
                            <p><strong>Usuário:</strong> {{ $tarefa->usuario->nome }}</p>
                            <div class="d-flex justify-content-start">
                                <a href="{{ route('tarefas.edit', $tarefa->id) }}" class="btn btn-warning me-2">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir essa tarefa?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash"></i> Excluir
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
