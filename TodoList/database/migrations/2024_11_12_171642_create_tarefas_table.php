<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // criando a tabela tarefas com os atributos id, setor, prioridade, descricao, status, idusuario e data
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->string('setor');
            $table->enum('prioridade', ['baixa', 'média', 'alta']);
            $table->enum('status', ['a fazer', 'fazendo', 'pronto'])->default('a fazer');
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarefas');
    }
};
