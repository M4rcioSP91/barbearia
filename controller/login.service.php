<?php

class loginService {

    private $conexao;

    public function __construct(conexao $conexao){
        $this->conexao = $conexao->conectar();
    }

    public function autenticar($email){

        $query = "SELECT * FROM tb_usuarios WHERE email = :email LIMIT 1";

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}

?>