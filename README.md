# SAEP - Prova prática - To-do List
Prova prática do saep - 12.11.2024


## Diagrama de Classe
``` mermaid
classDiagram
    direction LR
    
    class Usuario {
        +int id(PK)
        +String nome
        +String email
    }

    class Tarefa {
        +int id(PK)
        +int id_usuario(FK)
        +String descricao
        +String setor
        +String prioridade  // baixa, média, alta
        +Date dataCadastro
        +String status     // *a fazer, fazendo, pronto
        +atualizarStatus()
        +atualizarPrioridade()
    }

    Usuario "(1,1)" --> "(0,n)" Tarefa : possui
```

- Usuario (1,1) - cada tarefa é sempre associada a um único usuário.
- Tarefa (0,n) - um usuário pode estar associado a várias tarefas (0 ou mais).

## Diagrama de Uso
```
    Usuario1 --> (Cadastrar Usuários)
    Usuario1 --> (Cadastrar Tarefa)
    Usuario --> (Visualizar Tarefas)
    Usuario --> (Atualizar Tarefa)
    Usuario --> (Alterar Status da Tarefa)
    Usuario --> (Alterar Prioridade da Tarefa)
    
    (Cadastrar Tarefa) --> (Visualizar e Adicionar Tarefas)
    (Atualizar Tarefa) --> (Alterar Status da Tarefa)
    (Atualizar Tarefa) --> (Alterar Prioridade da Tarefa)
```

## Diagrama de Uso
``` mermaid
usecaseDiagram
    actor Usuario as U

    U --> (Cadastrar Usuários)
    U --> (Cadastrar Tarefa)
    U --> (Visualizar Tarefas)
    U --> (Atualizar Tarefa)
    U --> (Alterar Status da Tarefa)
    U --> (Alterar Prioridade da Tarefa)
    U --> (Editar atributos da Tarefa)
    U --> (Excluir Tarefa)
    
    (Cadastrar Tarefa) --> (Visualizar e Adicionar Tarefas)
    (Atualizar Tarefa) --> (Alterar Status da Tarefa)
    (Atualizar Tarefa) --> (Alterar Prioridade da Tarefa)
```

## ScriptDB - PostgreSQL
``` sql
-- Tabela Usuario
CREATE TABLE Usuario (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL, 
    email VARCHAR(255) UNIQUE NOT NULL
);

-- Tabela Tarefa
CREATE TABLE Tarefa (
    id SERIAL PRIMARY KEY,  
    id_usuario INT NOT NULL,
    descricao TEXT NOT NULL, 
    setor VARCHAR(255) NOT NULL,
    prioridade VARCHAR(50) NOT NULL,  -- Prioridade (baixa, média, alta)
    dataCadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    status VARCHAR(50) DEFAULT 'a fazer',
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id) ON DELETE CASCADE  -- (FK)
);

```