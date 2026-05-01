<?php
//CRUD
class minhaContaService{

private $conexao;
private $minhaConta;

public function __construct(conexao $conexao,minhaConta $minhaConta){//recebe a conexaõ e o objeto serviço
    $this->conexao = $conexao->conectar();
    $this->minhaConta = $minhaConta;
    }
    
    public function buscarPorId() {
    $query = "select * from tb_usuarios where id = :id";
    $stmt = $this->conexao->prepare($query);
    $stmt->bindValue(':id', $this->minhaConta->__get('id'));
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function atualizar() {

    $query = "UPDATE tb_usuarios
            SET nome = :nome,sobrenome = :sobrenome,nomeEmpresa = :nomeEmpresa,email = :email,telefone = :telefone WHERE id = :id";

    $stmt = $this->conexao->prepare($query);

    $stmt->bindValue(':nome', $this->minhaConta->__get('nome'));
    $stmt->bindValue(':sobrenome', $this->minhaConta->__get('sobrenome'));
    $stmt->bindValue(':nomeEmpresa', $this->minhaConta->__get('nomeEmpresa'));
    $stmt->bindValue(':email', $this->minhaConta->__get('email'));
    $stmt->bindValue(':telefone', $this->minhaConta->__get('telefone'));
    $stmt->bindValue(':id', $this->minhaConta->__get('id'));

    return $stmt->execute();
    }
    
}
    
?>