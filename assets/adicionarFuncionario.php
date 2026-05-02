
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CortePro - Cadastro de Funcionario</title>

        <link rel="stylesheet" href="css/estiloPronto.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('form').addEventListener('submit', function(e) {
                let senha = document.querySelector('[name="senha"]').value;
                let confirmar = document.querySelector('[name="confirmar_senha"]').value;

                if(senha !== confirmar) {
                    alert('As senhas não coincidem');
                    e.preventDefault();
                }
            });
        });
        </script>
    </head>
    <body>
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh; background:#f5f5f5;">
            <div class="bg-white p-4 rounded shadow" style="width: 400px;">
                            
                        <form class="row g-3" method="post" action="adicionarFuncionario_controller.php?acao=inserirFuncionario">
                            <div class="col-md-12">
                                <label class="form-label" placeholder="First name">Nome</label>
                                <input type="text" class="form-control" name="nome" placeholder="Seu nome">
                            </div>
                            <div class="col-md-12">
                                <label for="sobrenome" class="form-label">Sobrenome</label>
                                <input type="text" class="form-control" name="sobrenome" placeholder="Seu sobrenome">
                            </div>
                            <div class="col-md-12">
                                <label for="telefone" class="form-label">Telefone</label>
                                <input type="text" class="form-control" name="telefone" placeholder="11 99999 9999">
                            </div>
                            <div class="col-md-12">
                                <label for="nomeEmpresa" class="form-label">Nome da empresa</label>
                                <input type="text" class="form-control" name="nomeEmpresa" placeholder="Nome da sua empresa">
                            </div>
                            <div class="col-md-12">
                                <label for="email" class="form-label" >E-mail</label>
                                <input type="email" class="form-control" name="email" placeholder="seu@email.com">
                            </div>
                            <div class="col-md-12">
                                <label for="inputPassword3" class="form-label">Senha</label>
                                <input type="password" class="form-control" name="senha" placeholder="*********" required minlength="8">
                            </div>
                            <div class="col-md-12">
                                <label for="senha" class="form-label">Confirmar Senha</label>
                                <input type="password" class="form-control" name="confirmar_senha" placeholder="*********" required minlength="8">
                            </div>

                            <div class="col-12" style="margin-top: 2em;">
                                <button type="submit" class="btn btn-primary">Cadastro</button>
                            </div>
                </form>
            </div>
        </div>
    </body>
</html>