<?php
    require "../controller/dashboard.model.php";
    require "../controller/dashboard.service.php";
    require "../model/conexao.php";

    $conexao = new conexao();
    $dashboard = new dashboard_as();

    $dashboardService = new dashboardService($conexao, $dashboard);

    $dia = $dashboardService->recuperarDia();
    $semana = $dashboardService->recuperarSem();
    $mes = $dashboardService->recuperarMes();
    $ano = $dashboardService->recuperarAno();

    
    
?>