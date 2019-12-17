<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library</title>
    <script  type="text/javascript" src="app/validaLogin.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php
require_once ("./class/usuario.class.php");
require_once ("./dao/usuarioDAO.class.php");

if ( isset($_POST['logar']) and ($_POST['logar'] == 'Acessar')) {

	if( !empty($_POST['emailLogin']) && !empty($_POST['senhaLogin']) ) {

		$usuEmail = $_POST['emailLogin'];
		$usuSenha = $_POST['senhaLogin'];
		
		$usuario = new Usuario();
		
		$usuarioDAO = new UsuarioDAO();
		
		$resultado = $usuarioDAO-> buscaEmail($usuEmail);
		
		if ( count($resultado) == 0) {
			?>
			<script type="text/javascript">
				alert("Email não cadastrado");
				login.email.focus();
			</script>
			<?php
		} else {
			foreach($resultado as $linha) {
				$usuario-> setusuNome($linha['usuNome']);
				$usuario-> setusuEmail($linha['usuEmail']);
				$usuario-> setusuSenha($linha['usuSenha']);
			}

			if ($usuario -> getusuSenha() != $usuSenha) {
				?>
					<script type="text/javascript">
						alert("Senha não confere");
						login.email.focus();
					</script>
				<?php
			} else { 
				setcookie('usuEmail',$usuEmail);
				setcookie('usuSenha',$usuSenha);
				header('Location: admin.php');
				
			}

		}
	}
}


?>

</head>
<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Biblioteca Virtual</h3>
        <div class="container" width: 600px >
            <div id="login-row" class="row justify-content-center align-items-center" >
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login" name="login" method="post">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">E-mail</label><br>
                                <input type="email" name="emailLogin" placeholder="Digite seu e-mail" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Senha</label><br>
                                <input type="password" name="senhaLogin" placeholder="Digite sua senha" class="form-control">
                            </div>
                            <div class="form-group" >
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="logar" class="btn btn-info btn-md" value="Acessar" onclick="validaLogin()">
                                <a href="register.php" class="text-info">Registre aqui</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>