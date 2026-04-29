<?
	require 'auth.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Configuracao</title>

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
						<li class="list-group-item"><a href="servicos.php"><i class="fa-solid fa-briefcase"></i> Serviços</a></li>
						<li class="list-group-item"><a href="dashboard.php"><i class="fa-solid fa-arrow-trend-up"></i> Dashboard</a></li>
						<li class="list-group-item"><a href="cadastroCliente.php"><i class="fa-solid fa-address-card"></i> Cadastrar Cliente</a></li>
						<li class="list-group-item active"><a href="configuracao.php"><i class="fa-solid fa-gear"></i> Configuração</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Novo Serviço</h4>
								<hr />

								<div class="input-group mb-3">

									<form class="row g-3">


									<div class="col-md-9">
										<label for="validationServer03" class="form-label" >Senha</label>
										<input type="text" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required placeholder="Nova senha">
										<div id="validationServer03Feedback" class="invalid-feedback">
										Digite uma senha valida entre 8 - 20 caracteres.
										</div>
									</div>

									<div class="col-md-9" style="margin-bottom: 3em">
										<label for="validationServer03" class="form-label" >Confirmação de senha</label>
										<input type="text" class="form-control is-invalid" id="validationServer03" aria-describedby="validationServer03Feedback" required placeholder="Repita a senha">
										<div id="validationServer03Feedback" class="invalid-feedback">
										Digite uma senha valida entre 8 - 20 caracteres.
										</div>
									</div>

									<div class="col-12">
										<button class="btn btn-dark">Salvar</button>
									</div>
									
									</form>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>

		
	</body>
</html>