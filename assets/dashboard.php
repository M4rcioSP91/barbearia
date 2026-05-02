<?
	require 'dashboard_controller.php';
	require 'auth.php';

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>DashBoard</title>

		<link rel="stylesheet" href="css/estiloPronto.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/f7caf1b7d7.js" crossorigin="anonymous"></script>
		

	</head>

	<body id="geral">
		<nav id="topo">
			<div class="container">
				<a class="logo" class="navbar-logo" href="#">
					<img src="img/logo.png" width="30" height="30" >					
				</a>
				<div class="span-topo">
				<span><a href="logout.php" class="btn btn-danger" style="height: 2em">Sair <i class="fa-solid fa-right-from-bracket"></i></a></span>
				</div>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="home.php"><i class="fa-solid fa-house-user"></i> Home</a></li>						
						<?php if($_SESSION['tipo'] == 'admin') { ?>						
						<li class="list-group-item"><a href="servicos.php"><i class="fa-solid fa-briefcase"></i> Serviços</a></li>
						<? } ?>
						<li class="list-group-item active"><a href="dashboard.php"><i class="fa-solid fa-arrow-trend-up"></i> Dashboard</a></li>
						<li class="list-group-item"><a href="cadastroCliente.php"><i class="fa-solid fa-address-card"></i> Cadastrar Cliente</a></li>
						<li class="list-group-item"><a href="configuracao.php"><i class="fa-solid fa-gear"></i> Configuração</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
													
								<h3>DashBoard - Faturamento</h3>
								<hr />

								<!--LINHA DOS CARDS -->

								<?php if($_SESSION['tipo'] == 'admin') { ?>

									<?php foreach($dados as $usuario) { ?>

										<h4><?= $usuario->nome ?></h4>

										<div class="row mb-4">

											<div class="card border-light mb-3" style="max-width: 10rem;">
											<div class="card-header">DIA</div>
											<div class="card-body">
												<span class="" type="text" id="dia" readonly>R$ <?= $usuario->dia ?? 0 ?></span>
											</div>
											</div>
											</div>
											
											<div class="col-md-3">
											<div class="card border-light mb-3" style="max-width: 10rem;">
											<div class="card-header">SEMANA</div>
											<div class="card-body">
												<span class="" type="text" id="semana" readonly>R$ <?= $usuario->semana ?? 0 ?></span>
											</div>
											</div>
											</div>
											
											<div class="col-md-3">
											<div class="card border-light mb-3" style="max-width: 10rem;">
											<div class="card-header">MES</div>
											<div class="card-body">
												<span class="" type="text" id="mes" readonly>R$ <?= $usuario->mes ?? 0 ?></span>
											</div>
											</div>
											</div>
											
											<div class="col-md-3">
											<div class="card border-light mb-3" style="max-width: 10rem;">
											<div class="card-header">ANO</div>
											<div class="card-body">
												<span class="" type="text" id="ano" readonly>R$ <?= $usuario->ano ?? 0 ?></span>
											</div>
											</div>
											</div>
											

										</div>

									<?php } ?>
								<?php } ?>

								<?php if($_SESSION['tipo'] != 'admin') { ?>

									<h4><?= $_SESSION['nome'] ?></h4>

									<div class="row">
										<div class="col-md-3">

											<div class="card border-light mb-3" style="max-width: 10rem;">
											<div class="card-header">DIA</div>
											<div class="card-body">
												<span class="" type="text" id="dia" readonly>R$ <?= $dados->dia ?? 0 ?></span>
											</div>
											</div>
											</div>
											
											<div class="col-md-3">
											<div class="card border-light mb-3" style="max-width: 10rem;">
											<div class="card-header">SEMANA</div>
											<div class="card-body">
												<span class="" type="text" id="semana" readonly>R$ <?= $dados->semana ?? 0 ?></span>
											</div>
											</div>
											</div>
											
											<div class="col-md-3">
											<div class="card border-light mb-3" style="max-width: 10rem;">
											<div class="card-header">MES</div>
											<div class="card-body">
												<span class="" type="text" id="mes" readonly>R$ <?= $dados->mes ?? 0 ?></span>
											</div>
											</div>
											</div>
											
											<div class="col-md-3">
											<div class="card border-light mb-3" style="max-width: 10rem;">
											<div class="card-header">ANO</div>
											<div class="card-body">
												<span class="" type="text" id="ano" readonly>R$ <?= $dados->ano ?? 0 ?></span>
											</div>
											</div>
											</div>	
										</div>

									</div>

								<?php } ?>
								

								<!--LINHA DOS CARDS -->
						
								</div>

								
						</div>
						
					</div>
				</div>
			</div>
		</div>

		
	</body>
</html>