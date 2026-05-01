<?php
    session_start();
    var_dump($_SESSION);
    
    require "../controller/login.service.php";
    require "../model/conexao.php";
    
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if ($email == '' || $senha == '') {
        die('Preencha todos os campos');
    }

    $conexao = new conexao();
    $loginService = new loginService($conexao);

    $usuario = $loginService->autenticar($email);

    if ($usuario && password_verify($senha, $usuario->senha)) {

        // cria sessão
        $_SESSION['usuario_id'] = $usuario->id;
        $_SESSION['nome'] = $usuario->nome;

        header('Location: home.php');
        exit;

    } else {
        echo "Email ou senha inválidos";
    }

?>