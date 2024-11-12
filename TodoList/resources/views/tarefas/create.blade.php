@extends('layouts.app')

@section('content')
    <h1>Cadastro de Tarefa</h1>

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

        {{-- Formulário para criar Tarefa --}}
    <form action="{{ route('tarefas.store') }}" method="POST">
        @csrf
        <input type="text" name="descricao" placeholder="Descrição" required>
        <input type="text" name="setor" placeholder="Setor" required>
        <select name="prioridade" required>
            <option value="baixa">Baixa</option>
            <option value="média">Média</option>
            <option value="alta">Alta</option>
        </select>
        <select name="usuario_id" required> 
            {{-- Buscar os usuário na tabela usuarios --}}
            {{-- mostrar nome - cadastrar id no banco --}}
            @foreach ($usuarios as $usuario)
                <option value="{{ $usuario->id }}">{{ $usuario->nome }}</option>
            @endforeach
        </select>
        <button type="submit">Cadastrar</button>
    </form>
@endsection
