<?
	$acao = 'recuperar';
	require 'servico_controller.php';
	require 'auth.php';

	//echo'<pre>';
	//print_r ($servicos);
	//'</pre>';

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Serviços</title>

		<link rel="stylesheet" href="css/estiloPronto.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/f7caf1b7d7.js" crossorigin="anonymous"></script>

		<script>
			function editar(id,valor_do_servico) {
				//criar um form de edicao
				let form = document.createElement('form')
				form.action = 'servico_controller.php?acao=atualizar'
				form.method = 'post'
				form.className = 'row'

				//criar um imput para entrada do texto
				let inputValor = document.createElement('input')
				inputValor.type = 'text'
				inputValor.name = 'valor'
				inputValor.className = 'form-control col-8 form-control'
				inputValor.value = valor_do_servico

				//criar um input hidden para guardar o id da tarefa
				let inputId = document.createElement('input')
				inputId.type = 'hidden'
				inputId.name = 'id'
				inputId.value = id

				//criar um button para envio do form
				let button = document.createElement('button')
				button.type = 'submit'
				button.className = 'col-4 btn btn-primary btn-sm'
				button.innerHTML = 'Atualizar'

				//incluir inputServico no form
				form.appendChild(inputValor)

				//Incluir inputId no form
				form.appendChild(inputId)

				//incluir button no form
				form.appendChild(button)

				//teste
				//console.log(form)

				//selecionar a div do servico
				let valor = document.getElementById('valor_'+id)

				//limpar texto do servico para inlusão do form
				valor.innerHTML = ''

				//inlcuir form na pagina
				valor.insertBefore(form,valor[0])

				
			}

			function remover(id){
				location.href = 'servicos.php?acao=remover&id='+id;
			}
		</script>

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
				<!--exibe a barra de informação de cadatro execultado com sucesso-->
		<?php if(isset($_GET['inclusao']) && $_GET['inclusao'] == 1) { ?>

		<div class="bg-success pt-2 text-white d-flex justify-content-center">
			<h5> Cadastro realizado com sucesso!</h5>
		</div>

		<meta http-equiv="refresh" content="3;url=servicos.php">

		<? } ?>

		<div class="container app">
			<div class="row">
				<div class="col-md-3 menu">
					<ul class="list-group">
						<li class="list-group-item"><a href="home.php"><i class="fa-solid fa-house-user"></i> Home</a></li>						
						<li class="list-group-item  active"><a href="servicos.php"><i class="fa-solid fa-briefcase"></i> Serviços</a></li>
						<li class="list-group-item"><a href="dashboard.php"><i class="fa-solid fa-arrow-trend-up"></i> Dashboard</a></li>
						<li class="list-group-item"><a href="cadastroCliente.php"><i class="fa-solid fa-address-card"></i> Cadastrar Cliente</a></li>
						<li class="list-group-item"><a href="configuracao.php"><i class="fa-solid fa-gear"></i> Configuração</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Adicionar Serviço</h4>
								<hr />

                                <form method="post" action="servico_controller.php?acao=inserir">
									<div class="form-group">
										<label>Descrição do serviço:</label>
										<input type="text" class="form-control" name="servico" placeholder="Exemplo: Luzes">
									</div>
									<div class="form-group">
										<label>Valor:</label>
										<input type="text" class="form-control" name="valor" placeholder="R$ 35,00" style="width: 30%;">
									</div>

									<button class="btn2 btn">Cadastrar</button>
								</form>

                                <hr>
								
								<? foreach($servicos as $indice => $servico) { ?>

								

								<div class="row mb-3 d-flex align-items-center tarefa">
									
									<div class="col-sm-6" id="">
										<?= $servico->descricao ?>
									</div>
									<div class="col-sm-3" id="valor_<?=$servico->id ?>">
										<?= str_replace('.',',', $servico->valor_do_servico) ?>
									</div>


									<div class="col-sm-3 mt-2 d-flex justify-content-between">
										
										<i class="fas fa-edit fa-lg text-info" onclick="editar(<?= $servico->id ?>, <?= str_replace('.',',', $servico->valor_do_servico) ?>)"></i>
										<i class="fas fa-trash-alt fa-lg text-danger" onclick="remover(<?= $servico->id ?>)"></i>
									</div>
								</div>
																	


								<? } ?>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>