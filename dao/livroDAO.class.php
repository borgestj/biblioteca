<?php
require_once ("./dao/sql.php");

class LivroDAO extends Sql {

	public function listaLivros(){
		$sql = new Sql();
		$resultado = $sql -> select ("SELECT * FROM livros ORDER BY livroNome;");
		return $resultado;
	}

	public function insereLivro($livroNome, $livroAutor, $livroAno, $livroLocal){
		
		$sql = new Sql();

		$resultado = $sql -> query("INSERT INTO livros (livroNome, livroAutor, livroAno, livroLocal)
										VALUES (:NOME, :Autor, :ANO, :LUGAR)", 
		array(":NOME"=>$livroNome, ":AUTOR"=>$livroAutor ,":ANO"=>$livroAno, ":LUGAR"=>$livroLocal));
		return ($resultado);
	}

	public function excluiLivro($id){
		$sql = new Sql();
		$resultado = $sql -> query("DELETE FROM livros WHERE livroId = :ID", array(":ID"=>$id));
		return ($resultado);
	}

	public function alteraLivro($livroNome, $livroAutor, $livroAno, $livroLocal){
		$sql = new Sql();

		$resultado = $sql -> query("UPDATE livros
										SET livroNome = :NOME, 
										livroAutor = :AUTOR,
										livroAno = :ANO,
										livroLocal = :LUGAR 
										WHERE livroId = :ID", 
		array(":NOME"=>$livroNome, ":AUTOR"=>$livroAutor, ":ANO"=>$livroAno, ":LUGAR"=>$livroLocal, ":ID"=>$livroId));
		return ($resultado);
	}

	public function editaLivro($id){
		$sql = new Sql(); 
		$resultado = $sql->select("SELECT * FROM livros WHERE livroNome = :ID", array(":ID"=>$id));
		return ($resultado);
	}

	public function consultaLivro($livroNome){
		$sql = new Sql(); 	
		$resultado = $sql->select("SELECT * FROM livros WHERE livroNome = :NOME", array(":NOME"=>$livroNome));
		return ($resultado);
	}


}
?>