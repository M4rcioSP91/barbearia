<?php
    require "../controller/cliente.model.php";
    require "../controller/cliente.service.php";
    require "../model/conexao.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    
    if ($acao == 'inserir'){
    $cliente = new cliente ();
    $cliente->__set('nome',$_POST['nome']); // aqui o atributo é o mesmo do banco de dados "descricao" que ira receber o input servico do front
    $cliente->__set('telefone',$_POST['telefone']); // aqui o atributo é o mesmo do banco de dados "valor_do_servico" que ira receber o imput valor do front

    $conexao = new conexao();

    $clienteService = new clienteService($conexao, $cliente);
    $clienteService->inserir();

    header('Location: cadastroCliente.php?inclusao=1'); // redireciona para a pagina cadastroCliente.php
    }

    else if ($acao == 'recuperar'){
        $cliente = new cliente();
        $conexao = new conexao();

        $clienteService = new clienteService($conexao, $cliente);
        $clientes = $clienteService->recuperar();
    }
    
    else if ($acao == 'atualizar') {
        
       $cliente = new cliente ();
       $cliente->__set('id', $_POST['id']);
       $cliente->__set('telefone', $_POST['telefone']);

       $conexao = new conexao();

       $clienteService = new clienteService($conexao, $cliente);
       if($clienteService->atualizar()) {
        header('Location: cadastroCliente.php');
       }
    }

    else if ($acao == 'remover') {

        $cliente = new cliente();
        $cliente->__set('id', $_GET['id']);

        $conexao = new conexao();

        $clienteService = new clienteService($conexao, $cliente);
        $clienteService->remover();

        header('Location: cadastroCliente.php');
    }
?>