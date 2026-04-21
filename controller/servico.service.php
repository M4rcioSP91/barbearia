<?php

//CRUD
class servicoService{

private $conexao;
private $servico;

public function __construct(conexao $conexao,servico $servico){//recebe a conexaõ e o objeto serviço
    $this->conexao = $conexao->conectar();
    $this->servico = $servico;
}
    public function inserir(){ // create
                                          //nome da coluna,nome da coluna    //valor, Valor passados por parametro para ser substituido depois
        $query = 'insert into tb_servicos(descricao, valor_do_servico)values(:descricao, :valor_do_servico)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':descricao', $this->servico->__get('descricao'));
        $stmt->bindValue(':valor_do_servico', $this->servico->__get('valor_do_servico'));
        $stmt->execute();

    }
    public function recuperar(){ // read
        $query = 'select id, descricao, valor_do_servico from tb_servicos';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
        
    }
    public function atualizar(){ // update

        $query = "update tb_servicos set valor_do_servico = :valor where id = :id";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':valor', $this->servico->__get('valor_do_servico'));
        $stmt->bindValue(':id', $this->servico->__get('id'));
        return $stmt->execute();
        
    }
    public function remover(){ // delete

        $query = 'delete from tb_servicos where id = :id';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $this->servico->__get('id'));
        return $stmt->execute();
        
    }
}

?>