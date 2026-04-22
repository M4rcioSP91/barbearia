<?php

//CRUD
class homeTotalService{

private $conexao;
private $homeTotal;

public function __construct(conexao $conexao,homeTotal $homeTotal){//recebe a conexaõ e o objeto serviço
    $this->conexao = $conexao->conectar();
    $this->homeTotal = $homeTotal;
}
    public function inserir(){ // create

    $query = "INSERT INTO tb_atendimento (valorTotal) VALUES (:total)";
    $stmt = $this->conexao->prepare($query);
    $stmt->bindValue(':total', $this->homeTotal->__get('valorTotal'));
    
    $stmt->execute();                                     //nome da coluna,nome da coluna    //valor, Valor passados por parametro para ser substituido depois
       
    }
    public function recuperar(){ // read
        
    }
    public function atualizar(){ // update

        
        
    }
    public function remover(){ // delete

        
    }
}

?>