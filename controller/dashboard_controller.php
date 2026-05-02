<?php

require "../controller/dashboard.model.php";
require "../controller/dashboard.service.php";
require "../model/conexao.php";
require "../assets/auth.php";



if(!isset($_SESSION['usuario_id']) || !isset($_SESSION['tipo'])) {
    header('Location: index.php');
    exit;
}

$id = $_SESSION['usuario_id'];
$tipo = $_SESSION['tipo'];

$conexao = new conexao();
$dashboard = new dashboard_as();

$dashboard->__set('usuario_id', $id);
$dashboard->__set('tipo', $tipo);

$dashboardService = new dashboardService($conexao, $dashboard);

$dados = $dashboardService->recuperarTotais();