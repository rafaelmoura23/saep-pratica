@extends('layouts.app')

@section('content')
    <h1>Editar Tarefa</h1>

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
    
    {{-- formulário para atualização dos itens --}}
    <form action="{{ route('tarefas.update', $tarefa->id) }}" method="POST">
        @csrf
        @method('PUT') {{-- Método Atualizar --}}
        <input type="text" name="descricao" value="{{ old('descricao', $tarefa->descricao) }}" placeholder="Descrição" required>
        <input type="text" name="setor" value="{{ old('setor', $tarefa->setor) }}" placeholder="Setor">
        <select name="prioridade" required>
            <option value="baixa" {{ $tarefa->prioridade == 'baixa' ? 'selected' : '' }}>Baixa</option>
            <option value="média" {{ $tarefa->prioridade == 'média' ? 'selected' : '' }}>Média</option>
            <option value="alta" {{ $tarefa->prioridade == 'alta' ? 'selected' : '' }}>Alta</option>
        </select>
        <select name="status" required>
            <option value="a fazer" {{ $tarefa->status == 'a fazer' ? 'selected' : '' }}>A Fazer</option>
            <option value="fazendo" {{ $tarefa->status == 'fazendo' ? 'selected' : '' }}>Fazendo</option>
            <option value="pronto" {{ $tarefa->status == 'pronto' ? 'selected' : '' }}>Pronto</option>
        </select>
        <select name="usuario_id" required>
            @foreach($usuarios as $usuario)
                <option value="{{ $usuario->id }}" {{ $tarefa->usuario_id == $usuario->id ? 'selected' : '' }}>{{ $usuario->nome }}</option>
            @endforeach
        </select>
        
        <button type="submit">Atualizar Tarefa</button>
    </form>
@endsection
