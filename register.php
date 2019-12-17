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

if ( isset($_POST['salvar']) and ($_POST['salvar'] == 'Salvar')) {

	if( !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) ) {
		$usuario = new Usuario();
		$usuario-> setusuNome($_POST['nome']);
		$usuario-> setusuEmail($_POST['email']);
		$usuario-> setusuSenha($_POST['senha']);
		$usuarioDAO = new UsuarioDAO();
		$resultado = $usuarioDAO-> buscaEmail($usuario->getusuEmail());
		if ( count($resultado) > 0) {
			?>
				<script type="text/javascript">
					alert("Email já cadastrado");
					cadastro.email.focus();
				</script>
			<?php
		} else {
			$results = $usuarioDAO-> insereUsuario($usuario-> getusuNome(), $usuario-> getusuEmail(), $usuario-> getusuSenha());
			header('Location: index.php');
		}
	}
}
?>

</head>
<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Biblioteca Virtual</h3>
        <div class="container" width: 600px >
            <div class="row justify-content-center align-items-center" >
                <div class="col-md-6">
                    <div class="col-md-12">
                        <form id="cadastro" name="cadastro" method="post">
                            <h3 class="text-center text-info">Cadastro</h3>
                            <div class="form-group">
                                <label for="nome" class="text-info">Nome:</label><br>
                                <input type="nome" name="nome" id="nome" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email" class="text-info">E-mail:</label><br>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Senha:</label><br>
                                <input type="password" name="senha" id="senha" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary" name="salvar"	value="Salvar" onclick="valida()" >Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<script	src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>    
</body>
</html>