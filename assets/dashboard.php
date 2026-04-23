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
				<span><a href="index.php">Sair <i class="fa-solid fa-right-from-bracket"></i></a></span>
				</div>
			</div>
		</nav>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="home.php"><i class="fa-solid fa-house-user"></i> Home</a></li>						
						<li class="list-group-item"><a href="servicos.php"><i class="fa-solid fa-briefcase"></i> Serviços</a></li>
						<li class="list-group-item active"><a href="dashboard.php"><i class="fa-solid fa-arrow-trend-up"></i> Dashboard</a></li>
						<li class="list-group-item"><a href="cadastroCliente.php"><i class="fa-solid fa-address-card"></i> Cadastrar Cliente</a></li>
						<li class="list-group-item"><a href="configuracao.php"><i class="fa-solid fa-gear"></i> Configuração</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
													
								<h4>DashBoard</h4>
								<hr />

								<!--LINHA DOS CARDS -->
						<div class="row">

							<div class="col-md-3">

										<div class="card border-light mb-3" style="max-width: 10rem;">
										<div class="card-header">DIA</div>
										<div class="card-body">
											<p class="card-text">servidor</p>
										</div>
										</div>
										</div>

										<div class="col-md-3">
										<div class="card border-light mb-3" style="max-width: 10rem;">
										<div class="card-header">SEMANA</div>
										<div class="card-body">
											<p class="card-text">servidor</p>
										</div>
										</div>
										</div>

										<div class="col-md-3">
										<div class="card border-light mb-3" style="max-width: 10rem;">
										<div class="card-header">MES</div>
										<div class="card-body">
											<p class="card-text">servidor</p>
										</div>
										</div>
										</div>

										<div class="col-md-3">
										<div class="card border-light mb-3" style="max-width: 10rem;">
										<div class="card-header">ANO</div>
										<div class="card-body">
											<p class="card-text">servidor</p>
										</div>
										</div>
										</div>

									

									
							</div>
								<!--LINHA DOS CARDS FIM-->
								<!--LINHA DO GRAFICO-->
								<div class="card" style="width: 100%;">
								<div class="card-header">
									Produção
								</div>
								<div class="card-body">
									<!-- gráfico aqui -->
									
										<div id="meuGrafico" style="width: 400px; height: 300px;">
										</div>
								</div>
								</div>

								<!--LINHA DO GRAFICO FIM-->
						</div>
						
					</div>
				</div>
			</div>
		</div>

		<script src="https://www.gstatic.com/charts/loader.js"></script>
		<script>
		google.charts.load('current', {packages: ['corechart']});
		google.charts.setOnLoadCallback(drawChart);

		function drawChart() {
			
			var data = new google.visualization.DataTable();
			data.addColumn('string', 'Element');
			data.addColumn('number', 'Percentage');

			data.addRows([
				['Nitrogen', 0.78],
				['Oxygen', 0.21],
				['Other', 0.01]
			]);

			var chart = new google.visualization.ColumnChart(document.getElementById('meuGrafico'));
			chart.draw(data, null);
			}


		</script>
	</body>
</html>