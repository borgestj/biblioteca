<?php
	if (isset($_COOKIE['usuEmail'])) {
		$usuEmail = $_COOKIE['usuEmail'];
	}
	if (isset($_COOKIE['usuSenha'])) {
		$usuSenha = $_COOKIE['usuSenha'];
	}

	
	if ( !(empty($usuEmail)) and !(empty($usuSenha)) ) {
		
		$usuarioDAO = new UsuarioDAO();
		$resultado = $usuarioDAO-> buscaEmail($usuEmail);
		if ( count($resultado) == 0) {
			?>
				<script type="text/javascript">
					alert("Email não cadastrado");
				</script>
			<?php
			header('Location: index.php');
		} else {
			foreach($resultado as $linha) {
				$usuSenhaBD = $linha['usuSenha'];
			}
			// verifica se a senha informada é igual a senha cadastrado.
			if ($usuSenha != $usuSenhaBD) {
				?>
					<script type="text/javascript">
						alert("Senha não confere");
					</script>
				<?php
				header('Location: index.php');
			} 		
		}
	} else {
		?>
			<script type="text/javascript">
				alert("Você não realizou o login");
			</script>
		<?php
		header('Location: index.php');
	}
?>