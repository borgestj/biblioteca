<?php
	require_once ("./class/livro.class.php");
	require_once ("./dao/livroDAO.class.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>

<?php

if ( isset($_GET['nome']) and ($_GET['nome'] != "")) {

		$nome = $_GET['nome'];
	
		$livro = new Livro();
		
		$livroDAO = new LivroDAO();
		
		$resultado = $livroDAO-> consultaLivro($nome);
		
		if ( count($resultado) == 0) {
			?>
			<script type="text/javascript">
				alert("Livro não cadastrado");
				consulta.nome.focus();
			</script>
			<?php
		} else { 
			foreach($resultado as $linha) {
				$livro-> setlivroNome($linha['livroNome']);
				$livro-> setlivroAutor($linha['livroAutor']);
				$livro-> setlivroAno($linha['livroAno']);
				$livro-> setlivroLocal($linha['livroLocal']);
			}
		}
}
?>
</head>
<body>
</header>	
		<table class="table table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th width="40%">Nome</th>
					<th>Autor</th>
					<th>Ano da Publicação</th>
					<th>Localização</th>
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
				<?php } 
				} else {
					?>
					<tr>
						<td colspan="6">Nenhum registro encontrado.</td>
					</tr>
					<?php }	?>
			</tbody>
		</table>	
</body>
</html>