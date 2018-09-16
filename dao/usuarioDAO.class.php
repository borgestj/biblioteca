<?php
require_once (".\dao\sql.php");

class UsuarioDAO extends Sql {

	//consulta de todos os registros
	public function listaUsuario(){
		$sql = new Sql();
		$resultado = $sql -> select ("SELECT * FROM usuario ORDER BY usuNome;");
		return $resultado;
	}

	//inclusão do usuario
	public function insereUsuario($usuNome, $usuEmail, $usuSenha){
		
		$sql = new Sql();

		$resultado = $sql -> query("INSERT INTO usuario (usuNome, usuEmail, usuSenha)
										VALUES (:NOME, :EMAIL, :SENHA)", 
		array(":NOME"=>$usuNome, ":EMAIL"=>$usuEmail ,":SENHA"=>$usuSenha));
		return ($resultado);
	}

	//Excluir usuario
	public function excluiUsuario($id){
		$sql = new Sql();

		$resultado = $sql -> query("DELETE FROM usuario WHERE usuId = :ID", array(":ID"=>$id));
		return ($resultado);
	}

	public function buscaEmail($email){
		$sql = new Sql(); 
		$results = $sql->select("SELECT * FROM usuario WHERE usuEmail = :EMAIL", array(":EMAIL"=>$email));
		return $results;
	}

}
?>