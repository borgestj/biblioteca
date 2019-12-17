<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">	
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastrar</title>
	<script  type="text/javascript" src="app/validaLogin.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<?php
require_once ("./class/livro.class.php");
require_once ("./dao/livroDAO.class.php");

if ( isset($_POST['salvar']) and ($_POST['salvar'] == 'Salvar')) {
	
	if( !empty($_POST['nome']) && !empty($_POST['autor']) && !empty($_POST['ano']) && !empty($_POST['lugar']) ) {
		$livro = new Livro();
		$livro-> setlivroNome($_POST['nome']);
		$livro-> setlivroAutor($_POST['autor']);
		$livro-> setlivroAno($_POST['ano']);
		$livro-> setlivroLocal($_POST['lugar']);
		$livroDAO = new livroDAO();
		$resultado = $livroDAO-> buscaLivro($livro->getlivroNome());
		if ( count($resultado) > 0) {
			?>
				<script type="text/javascript">
					alert("Livro já cadastrado");
					cadastro.nome.focus();
				</script>
			<?php
		} else {
			$results = $livroDAO-> insereLivro($livro->getlivroNome(), $livro->getlivroAutor(), $livro->getlivroAno(), $livro->getlivroLocal());
			header('Location: admin.php');
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
                            <h3 class="text-center text-info">Cadastrar Livro</h3>
                            <div class="form-group">
                                <label for="name" class="text-info">Nome</label><br>
                                <input type="text" class="form-control" name="nome" id="nome">                            
							</div>
                            <div class="form-group">
                                <label for="autor" class="text-info">Autor</label><br>
                                <input type="text" class="form-control" name="autor" id="autor">
                            </div>
							<div class="form-group">
                                <label for="ano" class="text-info">Ano da Publicação</label><br>
                                <input type="text" class="form-control" name="ano" id="ano">
                            </div>
							<div class="form-group">
                                <label for="autor" class="text-info">Localização</label><br>
                                <input type="text" class="form-control" name="local" id="lugar">
                            </div>
                            <button type="submit" class="btn btn-primary" name="salvar"
								value="Salvar" onclick="validaLivro()" >Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>

</html>
