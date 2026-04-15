<?php

class servico {
    private $id;
    private $descricao;
    private $valor_do_servico;

        
    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
}
?>