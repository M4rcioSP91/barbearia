<?php

//CRUD
class clienteService{

private $conexao;
private $cliente;

public function __construct(conexao $conexao,cliente $cliente){//recebe a conexaõ e o objeto serviço
    $this->conexao = $conexao->conectar();
    $this->cliente = $cliente;
}
    public function inserir(){ // create
                                          //nome da coluna,nome da coluna    //valor, Valor passados por parametro para ser substituido depois
        $query = 'insert into tb_clientes(nome, telefone)values(:nome,:telefone)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':nome', $this->cliente->__get('nome'));
        $stmt->bindValue(':telefone', $this->cliente->__get('telefone'));
        $stmt->execute();

    }
    public function recuperar(){ // read
        $query = 'select id, nome, telefone from tb_clientes';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_OBJ);
    }
    public function atualizar(){ // update
        
    }
    public function remover(){ // delete
        
    }
}

?>