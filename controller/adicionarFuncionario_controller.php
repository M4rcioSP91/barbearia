<?php
    require "../controller/novoCadastro.model.php";
    require "../controller/adicionarFuncionario.service.php";
    require "../model/conexao.php";

    
$acao = $_GET['acao'] ?? '';

if ($acao == 'inserirFuncionario' && $_SERVER['REQUEST_METHOD'] === 'POST') {

    if(empty($_POST['email'])) {
    die('Email é obrigatório');
    }

    $senha = $_POST['senha'] ?? '';
    if ($senha == '') {
        die('Senha é obrigatória');
    }

    $cadastro = new novoCadastro();

    $cadastro->__set('nome', $_POST['nome'] ?? '');
    $cadastro->__set('sobrenome', $_POST['sobrenome'] ?? '');
    $cadastro->__set('email', $_POST['email'] ?? '');

       

    $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);
    $cadastro->__set('senha', $senha_criptografada);

    $cadastro->__set('telefone', $_POST['telefone'] ?? '');
    $cadastro->__set('nomeEmpresa', $_POST['nomeEmpresa'] ?? '');

    $conexao = new conexao();
    $adicionarFuncionarioService = new adicionarFuncionarioService($conexao, $cadastro);
    $adicionarFuncionarioService->inserir();

    try {
        $adicionarFuncionarioService->inserir();
        header('Location: index.php?sucesso=1');
    } catch (Exception $e) {
        header('Location: index.php?erro=' . urlencode($e->getMessage()));
    }

    exit;

}         
    
?>