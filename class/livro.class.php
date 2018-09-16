<?php

class Livro{

	private $livroId;
	private $livroNome;
	private $livroAutor;
	private $livroAno;
	private $livroLocal;
	
	public function getlivroId(){
		return $this->livroId;
	}

	public function setlivroId($livroId){
		$this->livroId = $livroId;
	}

	public function getlivroNome(){
		return $this->livroNome;
	}

	public function setlivroNome($livroNome){
		$this->livroNome = $livroNome;
	}
	
	public function getlivroAutor(){
		return $this->livroAutor;
	}

	public function setlivroAutor($livroAutor){
		$this->livroAutor = $livroAutor;
	}

	public function getlivroAno(){
		return $this->livroAno;
	}

	public function setlivroAno($livroAno){
		$this->livroAno = $livroAno;
	}

	public function getlivroLocal(){
		return $this->livroLocal;
	}

	public function setlivroLocal($livroLocal){
		$this->livroLocal = $livroLocal;
	}	
	
	public function __toString(){
		return
				"Id: ".$this->getlivroId().
				"<br> Nome: ".$this->getlivroNome().
				"<br> Autor: ".$this->getlivroAutor().
				"<br> Ano: ".$this->getlivroAno().
				"<br> Lugar: ".$this->getlivroLocal();
	}
}
?>