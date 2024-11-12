<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tarefa extends Model
{
    use HasFactory;

    protected $fillable = ['descricao', 'setor', 'prioridade', 'status', 'usuario_id'];

    // iusuario 
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
