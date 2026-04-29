<!DOCTYPE html>
<html>
    <head>
        <title>CortePro - Login</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/estilo.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    </head>
    <body id="login">
        <!--Inicio container-->
    <div id="container-login" >
        <img src="img/Logo.png" >
        <div id="login">
            <form method="post" action="login_controller.php">
                <div class="form-group">
                <input class="form-control" type="text" name="email" placeholder="Digite seu e-mail" required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
                </div>
                <div>
            <button class="class=btn button"type="submit" >Entrar</button>
                </div>
            </form>           
                        
        </div> 
            <div>
                <div style="margin: 0 auto; width: 230px;">
                <a href="novo_cadastro.php">Criar cadastro</a><span> - </span>
                
                <a href="Novo_Cadastro.php">Esqueci a senha</a>
                </div>
            </div>
               
    </div> <!--Fim container-->   
    </body>
</html>