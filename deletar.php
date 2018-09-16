<?php
	require_once (".\class\livro.class.php");
	require_once (".\dao\livroDAO.class.php");
	
	if ( isset($_GET['id']) and ($_GET['id'] != "")) {
	
		// recebe os dados do formulário
		$id = $_GET['id'];
	
		// instancia o livroDAO para fazer conexão e comandos relacionados ao BD
		$livroDAO = new LivroDAO();
		// Pesquisa se o livro informado existe.
		$resultado = $livroDAO-> excluiLivro($id);
		header('Location: admin.php');
	}
?>