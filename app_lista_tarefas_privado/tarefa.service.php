<?php

class TarefaService {

    private $conexao;
    private $tarefa;

    public function __construct(Conexao $conexao,Tarefa $tarefa) {
        $this->conexao = $conexao->conectar();
        $this->tarefa = $tarefa;

    }

    public function inserir(){ // create
        $query = 'insert into tb_tarefas(tarefa, id_status)values(:tarefa, :id_status)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
        $stmt->bindValue(":id_status", 1);
        $stmt->execute();
    }

    public function recuperar(){ // read
        $query = '
            select
                id, id_status, tarefa 
            from 
                tb_tarefas
        ';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }

    public function atualizar(){ // update
        $query = "update tb_tarefas set tarefa = ? where id = ?";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(1, $this->tarefa->__get('tarefa'));
        $stmt->bindValue(2, $this->tarefa->__get('id'));

        return $stmt->execute();
    }

    public function remover(){ // delete
        $query = 'delete from tb_tarefas where id = :id';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $this->tarefa->__get('id'));
        
        $stmt->execute();
    }

    public function marcarRealizada(){ // update
        $query = "update tb_tarefas set id_status = ? where id = ?";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(2, $this->tarefa->__get('id'));
        $stmt->bindValue(1, 2);
        return $stmt->execute();
    }

    public function recuperarTarefasPendentes(){ // read
        $query = '
            select
                id, id_status, tarefa 
            from 
                tb_tarefas
            where
                id_status = 1
        ';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);

    }
}




?>