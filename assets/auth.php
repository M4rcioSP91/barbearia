<?php
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['usuario_id']) || !isset($_SESSION['tipo'])) {
    header('Location: index.php');
    exit;
}