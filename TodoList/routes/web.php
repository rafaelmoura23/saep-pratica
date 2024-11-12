<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\UsuarioController;

Route::get('/', [TarefaController::class, 'index'])->name('tarefas.index');
Route::resource('tarefas', TarefaController::class);
Route::resource('usuarios', UsuarioController::class);