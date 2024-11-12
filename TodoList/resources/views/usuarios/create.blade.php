@extends('layouts.app')

@section('content')
    <h1>Cadastro de Usuários</h1>

    <!-- Mensagem de Sucesso ou Erro -->
    @if(session('success'))
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

    <!-- Formulário de Cadastro -->
    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf
        <input type="text" name="nome" placeholder="Nome" value="{{ old('nome') }}" required>
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
        <button type="submit">Cadastrar</button>
    </form>
@endsection

