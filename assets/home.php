<?
	$acao = 'recuperar';
	require 'servico_controller.php';

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Home</title>

		<link rel="stylesheet" href="css/estiloPronto.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/f7caf1b7d7.js" crossorigin="anonymous"></script>
		
		<script>
		document.addEventListener('DOMContentLoaded', function(){

			document.querySelectorAll('.check-servico').forEach(function(checkbox) { // Procura todos os elementos com classe .check-servico
				checkbox.addEventListener('change', calcularTotal);//Aqui ele adiciona um evento em cada checkbox.change = quando marca ou desmarca.calcularTotal = função que será executada
			});

			function calcularTotal() {
				let total = 0;

				document.querySelectorAll('.check-servico:checked').forEach(function(item) {
					total += parseFloat(item.value);//item.value → valor do checkbox (ex: "10.50")--parseFloat() → transforma em número
				});

				document.getElementById('total').innerText = 'R$' + total.toFixed(2).replace('.', ',');

				document.getElementById('total_hidden').value = total;
			}

		});
		</script>
		
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

		<?php if(isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>

		<div class="bg-success pt-2 text-white d-flex justify-content-center">
			<h5> Cadastro realizado com sucesso!</h5>
		</div>

		<meta http-equiv="refresh" content="3;url=home.php">

		<? } ?>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item active"><a href="home.php"><i class="fa-solid fa-house-user"></i> Home</a></li>						
						<li class="list-group-item"><a href="servicos.php"><i class="fa-solid fa-briefcase"></i> Serviços</a></li>
						<li class="list-group-item"><a href="dashboard.php"><i class="fa-solid fa-arrow-trend-up"></i> Dashboard</a></li>
						<li class="list-group-item"><a href="cadastroCliente.php"><i class="fa-solid fa-address-card"></i> Cadastrar Cliente</a></li>
						<li class="list-group-item"><a href="configuracao.php"><i class="fa-solid fa-gear"></i> Configuração</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Serviço atual</h4>
								<hr />
															
								
								<table>
								<? foreach($servicos as $indice => $servico) { ?>
										

										<div class="row d-flex align-items-center tarefa">
									
										<tr>
											<td class="nome-cliente"><div class="col-sm-9"><?= $servico->descricao ?></div></td>
											<td class=><?= str_replace('.',',', $servico->valor_do_servico) ?></td>
											<td class="celula-alinhamento"><div class="form-check">
												<input 
													class="check-servico"
													name="servicos[]" 
													type="checkbox" 
													value="<?= $servico->valor_do_servico ?>"
													data-id="<?= $servico->id ?>">
											</td>
															

								<? } ?>
								</table>

                                <br>

								<form method="post" action="home_total_controller.php?acao=salvar_atendimento">
								<div class="row mb-3 d-flex align-items-center tarefa">
									<div class="col-sm-9">Total
										<span class="input-home" type="text" id="total" readonly>R$ 0,00</span></div>
										<input type="hidden" id="total_hidden" name="total">
									<div class="col-sm-3 mt-2 d-flex justify-content-between">
									</div>
								</div>
								
                                <button class="btn2 btn btn-home">Cadastrar</button>
								</form>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>

</html>