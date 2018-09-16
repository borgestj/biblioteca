<?php
	require_once (".\class\livro.class.php");
	require_once (".\dao\livroDAO.class.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edição</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script	src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>

	<script type="text/javascript">

			document.editar.reset();
			editar.nome.reset();
	
			function valida(){

				var nome = editar.nome.value;
				var autor = editar.autor.value;
				var ano = editar.ano.value;
				var lugar = editar.lugar.value;
			
				if(nome == "") {
					alert("Preencha o nome");
					editar.nome.focus();
					return false;
				} else  if (autor == "") {
					alert("Preencha o autor");
					editar.autor.focus();
					return false;
				} else  if (ano == "") {
					alert("Preencha o ano");
					editar.ano.focus();
					return false;
				}
				if (lugar == "") {
					alert("Preencha o lugar");
					editar.lugar.focus();
					return false;
				}
	}
</script>

<?php
if ( isset($_GET['id']) and ($_GET['id'] != "")) {

	$id = $_GET['id'];

	$livro = new Livro();

	$livroDAO = new LivroDAO();

	$resultado = $livroDAO-> editaLivro($id);

	if ( count($resultado) == 0) {
		?>
			<script type="text/javascript">
				alert("Livro não cadastrado");
				cadastra.livro.focus();
			</script>
		<?php
	} else {
		foreach($resultado as $linha) {
			$livro-> setlivroId($linha['livroId']);
			$livro-> setlivroNome($linha['livroNome']);
			$livro-> setlivroAutor($linha['livroAutor']);
			$livro-> setlivroAno($linha['livroAno']);
			$livro-> setlivroLocal($linha['livroLocal']);
		}
	}
}

if ( isset($_POST['voltar']) and ($_POST['voltar'] == 'Retornar')) {
	header('Location: admin.php');
}

if ( isset($_POST['salvar']) and ($_POST['salvar'] == 'Salvar')) {

	if( !empty($_POST['nome']) && !empty($_POST['autor']) && !empty($_POST['ano']) && !empty($_POST['local']) ) {
		$livro-> setlivroId($_POST['id']);
		$livro-> setlivroNome($_POST['nome']);
		$livro-> setlivroAutor($_POST['autor']);
		$livro-> setlivroAno($_POST['ano']);
		$livro-> setlivroLocal($_POST['local']);
		
		$livroDAO = new LivroDAO();
		
		$resultado = $livroDAO-> alteraLivro($livro->getlivroId(), $livro->getlivroNome(), $livro->getlivroAutor(),
		$livro->getlivroAno(), $livro->getlivroLocal());
	}
	header('Location: admin.php');
}


?>
</head>
<body>
	<div class="container">
	<header>
		<div class="row">
			<div class="col-sm-6">
				<h2>Dados do Livro</h2>
			</div>
		</div>
	</header>	
		<div class="row">
			<div class="col-sm-8">
				<form id="editar" name="editar" method="post">

					<div class="form-group">
					<input type="hidden" name="id" id="id" value=<?php echo $livro->getlivroId();?> >
					</div>
					
					<div class="form-group">
						<label>Nome</label>
						 <input type="text" class="form-control" 
							name="nome" id="nome" value=<?php echo $livro->getlivroNome(); ?> >
					</div>

					<div class="form-group">
						<label>Autor</label> <input type="text" class="form-control"
							name="autor" id="autor"
							value=<?php echo $livro->getlivroAutor(); ?>>
					</div>

					<div class="form-group">
						<label>Ano da Publicação</label> <input type="text" class="form-control"
							name="ano" id="ano"
							value=<?php echo $livro->getlivroAno(); ?>>
					</div>

					<div class="form-group">
						<label>Localização</label> <input type="text" class="form-control"
							name="local" id="local" value=<?php echo $livro->getlivroLocal(); ?>>
					</div>

					<button type="submit" class="btn btn-success" name="salvar"
						value="Salvar" onclick="valida()">Salvar</button>

					<input type="submit" class="btn btn-info" name="voltar"
						value="Retornar">
				</form>
			</div>
		</div>
	</div>
</body>
</html>
