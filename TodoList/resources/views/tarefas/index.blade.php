@extends('layouts.app')

@section('content')
    <h1>Gerenciamento de Tarefas</h1>

    <!-- Mensagem de Sucesso ou Erro -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <!-- Coluna A Fazer -->
        <div class="col-md-4">
            <h3 class="text-center">A Fazer</h3>
            <div>
                @foreach ($tarefas as $tarefa)
                {{-- Comparando o status e adicionando na primeira coluna --}}
                    @if ($tarefa->status == 'a fazer') 
                        <div class="card mb-3 p-3 border">
                            <h5 class="text-center">{{ $tarefa->descricao }}</h5>
                            <p><strong>Status:</strong> {{ $tarefa->status }}</p>
                            <p><strong>Prioridade:</strong> {{ $tarefa->prioridade }}</p>
                            <p><strong>Setor:</strong> {{ $tarefa->setor }}</p>
                            <p><strong>Usuário:</strong> {{ $tarefa->usuario->nome }}</p>
                             {{-- Botão para editar tarefa levando o id --}}
                            <div class="d-flex justify-content-start">
                                <a href="{{ route('tarefas.edit', $tarefa->id) }}" class="btn btn-warning me-2">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                <form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir essa tarefa?')">
                                    @csrf
                                    @method('DELETE')
                                    {{-- Botão para excluir a tarefa --}}
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
                {{-- Comparando o status e adicionando na segunda coluna --}}
                    @if ($tarefa->status == 'fazendo')
                        <div class="card mb-3 p-3 border">
                            <h5>{{ $tarefa->descricao }}</h5>
                            <p><strong>Status:</strong> {{ $tarefa->status }}</p>
                            <p><strong>Prioridade:</strong> {{ $tarefa->prioridade }}</p>
                            <p><strong>Setor:</strong> {{ $tarefa->setor }}</p>
                            <p><strong>Usuário:</strong> {{ $tarefa->usuario->nome }}</p>
                            <div class="d-flex justify-content-start">
                                 {{-- Botão para editar tarefa levando o id --}}
                                <a href="{{ route('tarefas.edit', $tarefa->id) }}" class="btn btn-warning me-2">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                {{-- Botão para excluir a tarefa --}}
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
                {{-- Comparando o status e adicionando na terceira coluna --}}
                    @if ($tarefa->status == 'pronto')
                        <div class="card mb-3 p-3 border">
                            <h5>{{ $tarefa->descricao }}</h5>
                            <p><strong>Status:</strong> {{ $tarefa->status }}</p>
                            <p><strong>Prioridade:</strong> {{ $tarefa->prioridade }}</p>
                            <p><strong>Setor:</strong> {{ $tarefa->setor }}</p>
                            <p><strong>Usuário:</strong> {{ $tarefa->usuario->nome }}</p>
                            {{-- Botão para editar tarefa levando o id --}}
                            <div class="d-flex justify-content-start">
                                <a href="{{ route('tarefas.edit', $tarefa->id) }}" class="btn btn-warning me-2">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>

                                {{-- Botão para excluir a tarefa --}}
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
