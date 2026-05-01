<?php
    require "../controller/minhaConta.model.php";
    require "../controller/minhaConta.service.php";
    require "../model/conexao.php";

    if(session_status() === PHP_SESSION_NONE) {
    session_start();
}
    //var_dump($_SESSION); mostra na tela o array de usuario logado na sessão
    
    $minhaConta = new minhaConta();
    $minhaConta->__set('id', $_SESSION['usuario_id']);

    $conexao = new Conexao();
    $minhaContaService = new minhaContaService($conexao, $minhaConta);

    $dadosUsuario = $minhaContaService->buscarPorId();

?>