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
    
    $stmt->execute();
    
    return $this->conexao->lastInsertId();
       
    }
    
    public function inserirServicos($atendimento_id, $servico_id){ 

         // busca o valor do serviço
        $query = "SELECT valor_do_servico FROM tb_servicos WHERE id = :id";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $servico_id);
        $stmt->execute();

        $servico = $stmt->fetch();

        // insere com valor

        $query = "INSERT INTO  tb_atendimento_servico (idUsuario, idAtendimento, idServico, valorHistorico)VALUES (:idUsuario, :atendimento_id,:servico_id, :valor)";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':atendimento_id', $atendimento_id);
        $stmt->bindValue(':servico_id', $servico_id);
        $stmt->bindValue(':valor', $servico['valor_do_servico']);
        $stmt->bindValue(':idUsuario', $this->homeTotal->__get('idUsuario'));

        return $stmt->execute();
             
}
}
?>