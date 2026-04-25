<?php

class dashboard_as {
    private $id;
    private $criado_em;

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
}
?>