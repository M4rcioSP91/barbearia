<?php
session_start();

require "../model/conexao.php";


$conexao = new Conexao();
$db = $conexao->conectar();

$senhaAtual = $_POST['senha_atual'];
$novaSenha = $_POST['nova_senha'];
$confirmarSenha = $_POST['confirmar_senha'];
$id = $_SESSION['usuario_id'];

// validar confirmação
if($novaSenha !== $confirmarSenha) {
    header('Location: trocar_senha.php?erro=senha_diferente');
    exit;
}

// validar tamanho
if(strlen($novaSenha) < 8) {
    header('Location: trocar_senha.php?erro=senha_curta');
    exit;
}

// buscar usuário
$query = "SELECT senha FROM tb_usuarios WHERE id = :id";
$stmt = $db->prepare($query);
$stmt->bindValue(':id', $id);
$stmt->execute();

$usuario = $stmt->fetch(PDO::FETCH_OBJ);

if(!$usuario) {
    header('Location: trocar_senha.php?erro=usuario_nao_encontrado');
    exit;
}

// verificar senha atual
if(!password_verify($senhaAtual, $usuario->senha)) {
    header('Location: trocar_senha.php?erro=senha_incorreta');
    exit;
}

// evitar senha igual
if(password_verify($novaSenha, $usuario->senha)) {
    header('Location: trocar_senha.php?erro=senha_igual');
    exit;
}

// criptografar
$novaSenhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);

// atualizar
$update = "UPDATE tb_usuarios SET senha = :senha WHERE id = :id";
$stmt = $db->prepare($update);
$stmt->bindValue(':senha', $novaSenhaHash);
$stmt->bindValue(':id', $id);
$stmt->execute();

// sucesso
header('Location: configuracao.php?status=senha_ok');
exit;