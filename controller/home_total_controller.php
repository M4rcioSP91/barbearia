<?php
    require "../controller/home_total.model.php";
    require "../controller/home_total.service.php";
    require "../model/conexao.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if($acao == 'salvar_atendimento'){
    
    $homeTotal = new homeTotal ();
    $total = str_replace(',', '.', $_POST['total']);
    $homeTotal->__set('valorTotal',$total);

    $conexao = new conexao();

    $homeTotalService = new homeTotalService($conexao, $homeTotal);
    
    $homeTotalService->inserir();
    
    

    header('location: home.php?inclusao=1');
    
    }

?>