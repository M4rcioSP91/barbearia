<?php
    require "../controller/dashboard.model.php";
    require "../controller/dashboard.service.php";
    require "../model/conexao.php";

    $conexao = new conexao();
    $dashboard = new dashboard_as();
    $dashboardService = new dashboardService($conexao, $dashboard);

    //area do grafico

    $tipo = $_GET['tipo'] ?? 'mes';

        switch ($tipo) {

            case 'mes':
                $dados = $dashboardService->faturamentoMes();
                break;

            case 'servicos':
                $dados = $dashboardService->servicosVendidos();
                break;

    }

    header('Content-Type: application/json');
    echo json_encode($dados);

        
?>