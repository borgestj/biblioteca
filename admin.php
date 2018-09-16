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
    <title>Livros</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script>
		function excluir(id) {
    		var apagar = confirm('Você deseja excluir este Livro?');
    		if (apagar){
        		location.href = 'deletar.php?id='+ id;
       		}   
		}
	</script>
</head>

<body>
	<div class="container">

	<header>
		<div class="row">
			<div class="col-sm-6">
				<h1>Manter Livros</h1>
			</div>
			<div class="col-sm-6 text-right h2">
			   	<a class="btn btn-default" href="logout.php"><i class="fa fa-refresh"></i>Sair</a>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6 text-left h2">
				<a href="cadastrar.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Novo Livro</a>
				<a href="consultar.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Consultar</a>
		    </div>
		</div>
	</header>	
		<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th width="40%">Nome</th>
					<th>Autor</th>
					<th>Ano da Publicação</th>
					<th>Localização</th>
					<th>Opções</th>
				</tr>
			</thead>
			<tbody>
				<?php if ($livros) {
					foreach ($livros as $livros) {
					?><tr>
						<td id="livroId"><?php echo $livros['livroId']; ?></td>
						<td><?php echo $livros['livroNome']; ?></td>
						<td><?php echo $livros['livroAutor']; ?></td>
						<td><?php echo $livros['livroAno']; ?></td>
						<td><?php echo $livros['livroLocal']; ?></td>
						<td class="actions text-left">
							<a href="editar.php?id=<?php echo $livros['livroId']; ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> Editar</a>
							<a href="#" id="Excluir" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-modal" data-customer="<?php echo $livros['livroId']; ?>" onclick="excluir(<?php echo $livros['livroId']; ?>)">
								<i class="fa fa-trash"></i> Remover
							</a>
						</td>
					<?php } 
				
				} else {
					?>
					<tr>
						<td colspan="6">Nenhum registro encontrado.</td>
					</tr>
					<?php }	?>
			</tbody>
		</table>
	</div>

	<script	src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
