<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use App\Models\Usuario;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index()
    {
        $tarefas = Tarefa::with('usuario')->get();
        return view('tarefas.index', compact('tarefas'));
    }

    public function create()
    {
        $usuarios = Usuario::all();
        return view('tarefas.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        Tarefa::create($request->all());
        return redirect()->route('tarefas.index');
    }

     // Formulário para editar tarefa
     public function edit($id)
     {
         $tarefa = Tarefa::findOrFail($id);
         $usuarios = Usuario::all(); // select *
         return view('tarefas.edit', compact('tarefa', 'usuarios'));
     }
 
     // Método para Atualizar a Tarefa
     public function update(Request $request, $id)
     {
         // validação dos dados
         $request->validate([
             'descricao' => 'required|string|max:255',
             'setor' => 'required|string|max:100',
             'prioridade' => 'required|in:baixa,média,alta',
             'status' => 'required|in:a fazer,fazendo,pronto',
             'usuario_id' => 'required|exists:usuarios,id',
         ]);
 
         // pegar a tarefa por meio do ID
         $tarefa = Tarefa::findOrFail($id);
         $tarefa->update($request->all());
 
         return redirect()->route('tarefas.index')->with('success', 'Tarefa atualizada com sucesso!'); // mostrar mensagem
     }
 
     // Excluir tarefa
     public function destroy($id)
     {
         $tarefa = Tarefa::findOrFail($id);
         $tarefa->delete();
 
         return redirect()->route('tarefas.index')->with('success', 'Tarefa excluída com sucesso!'); // mostrar mensagem
     }
}