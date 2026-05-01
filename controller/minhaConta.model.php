<?php

class minhaConta {
    private $id;
    private $nome;
    private $sobrenome;
    private $nomeEmpresa;
    private $email;
    private $telefone;
    private $senha;

        
    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
}
?>