<?php
	require_once (".\class\livro.class.php");
	require_once (".\dao\livroDAO.class.php");
	$livroDAO = new LivroDAO();
	$livros = $livroDAO-> listaLivros();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Consultar</title>
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

<?php
if ( isset($_POST['pesquisar']) and ($_POST['pesquisar'] == 'pesquisar')) {
    ?>
    <script>
		function lista(nome) {
            var = nome => lista()
            if (nome){
        		location.href = 'pesquisar.php';
       		}   
		}
	</script>
    <?php
}
?>

</head>
<body>
	<div class="container">
	<header>
		<div class="row">
			<div class="col-sm-6">
				<h2>Consultar Livros</h2>
			</div>
			<div class="col-sm-6 text-right h2">
				<a class="btn btn-default" href="admin.php"><i class="fa fa-refresh"></i>Voltar</a>
		    </div>
		</div>
	</header>	
		
	<div class="row">
		<div class="col-sm-8">
			<form name="consulta" method="post">
                <h3>Filtrar por:</h3>
            	<div class="form-group">
					<label>Nome </label> <input type="text" class="form-control" name="nome" 
                        id="nome">
                    <label>Autor </label> <input type="text" class="form-control" name="autor" 
                        id="autor">
                    <label>Ano da Publição </label> <input type="text" class="form-control" name="ano" 
                        id="ano">
                </div>
				<div class="form-group">
				    <button type="submit" class="btn btn-primary" name="pesquisar"	value="pesquisar">Consultar</button>	
				</div>
                <div>
                    <?php include 'pesquisar.php'; ?>
                </div>
			</form>
		</div>
	</div>
</body>
</html>
