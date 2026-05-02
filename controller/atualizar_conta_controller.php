<?php
require "../controller/minhaConta.model.php";
require "../controller/minhaConta.service.php";
require "../model/conexao.php";

session_start();

    

        $minhaConta = new minhaConta();

        //ID vem da sessão 
        $minhaConta->__set('id', $_SESSION['usuario_id']);
        $minhaConta->__set('nome', $_POST['nome'] ?? null);
        $minhaConta->__set('sobrenome', $_POST['sobrenome'] ?? null);
        $minhaConta->__set('nomeEmpresa', $_POST['nomeEmpresa'] ?? null);
        $minhaConta->__set('telefone', $_POST['telefone'] ?? null);

        
        if(!empty($_POST['email'])) {
        $minhaConta->__set('email', $_POST['email']);
        }

             
        $conexao = new Conexao();
        $minhaContaService = new minhaContaService($conexao, $minhaConta);

        $minhaContaService->atualizar();

        // volta pra tela
        header('Location: minhaConta.php');
   
?>