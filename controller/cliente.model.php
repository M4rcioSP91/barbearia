<?php

class cliente {
    private $id;
    private $nome;
    private $telefone;

        
    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
}
?>