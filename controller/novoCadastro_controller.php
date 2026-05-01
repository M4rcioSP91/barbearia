<?php
    require "../controller/novoCadastro.model.php";
    require "../controller/novoCadastro.service.php";
    require "../model/conexao.php";

    
$acao = $_GET['acao'] ?? '';

if ($acao == 'inserir' && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $cadastro = new novoCadastro();

    $cadastro->__set('nome', $_POST['nome'] ?? '');
    $cadastro->__set('sobrenome', $_POST['sobrenome'] ?? '');
    $cadastro->__set('email', $_POST['email'] ?? '');

    $senha = $_POST['senha'] ?? '';
    if ($senha == '') {
        die('Senha é obrigatória');
    }

    $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);
    $cadastro->__set('senha', $senha_criptografada);

    $cadastro->__set('telefone', $_POST['telefone'] ?? '');
    $cadastro->__set('nomeEmpresa', $_POST['nomeEmpresa'] ?? '');

    $conexao = new conexao();
    $novoCadastroService = new novoCadastroService($conexao, $cadastro);
    $novoCadastroService->inserir();

    header('Location: index.php');
    exit;
}         
    
?>