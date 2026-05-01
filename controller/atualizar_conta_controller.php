<?php
require "../controller/minhaConta.model.php";
require "../controller/minhaConta.service.php";
require "../model/conexao.php";

session_start();

    

        $minhaConta = new minhaConta();

        //ID vem da sessão 
        $minhaConta->__set('id', $_SESSION['usuario_id']);

        // Dados do formulário
        $minhaConta->__set('senha', $_POST['senha']);
        

        $conexao = new Conexao();
        $minhaContaService = new minhaContaService($conexao, $minhaConta);

        $minhaContaService->atualizar();

        // volta pra tela
        header('Location: minhaConta.php');
   
?>