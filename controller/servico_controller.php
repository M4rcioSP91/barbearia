<?php
    require "../controller/servico.model.php";
    require "../controller/servico.service.php";
    require "../model/conexao.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if ($acao == 'inserir'){
    $servico = new servico ();
    $servico->__set('descricao',$_POST['servico']); // aqui o atributo é o mesmo do banco de dados "descricao" que ira receber o input servico do front
    $servico->__set('valor_do_servico',$_POST['valor']); // aqui o atributo é o mesmo do banco de dados "valor_do_servico" que ira receber o imput valor do front

    $conexao = new conexao();

    $servicoService = new servicoService($conexao, $servico);
    $servicoService->inserir();

    header('Location: servicos.php?inclusao=1');
    }

    else if ($acao == 'recuperar'){
        $servico = new servico();
        $conexao = new conexao();

        $servicoService = new servicoService($conexao, $servico);
        $servicos = $servicoService->recuperar();
    }


?>