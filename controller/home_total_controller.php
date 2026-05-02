<?php
    require "../controller/home_total.model.php";
    require "../controller/home_total.service.php";
    require "../model/conexao.php";
    session_start();

           
    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if($acao == 'salvar_atendimento'){
    
    $homeTotal = new homeTotal ();
    $total = str_replace(',', '.', $_POST['total']);
    $homeTotal->__set('valorTotal',$total);

    $homeTotal->__set('idUsuario', $_SESSION['usuario_id']);

    $conexao = new conexao();    

    $homeTotalService = new homeTotalService($conexao, $homeTotal);

    $atendimento_id = $homeTotalService->inserir();

    if(isset($_POST['servicos'])) {
        foreach ($_POST['servicos'] as $servico_id) {
            $homeTotalService->inserirServicos($atendimento_id, $servico_id);
        }
    }
    
    

    header('location: home.php?inclusao=1');
    
    }

?>