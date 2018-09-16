<?php

class Usuario{
	
	private $usuId;
	private $usuNome;
	private $usuEmail;
	private $usuSenha;
	private $usuTipo;
	
	public function getusuId(){
		return $this->usuId;
	}

	public function setusuId($usuId){
		$this->usuId = $usuId;
	}

	public function getusuNome(){
		return $this->usuNome;
	}

	public function setusuNome($usuNome){
		$this->usuNome = $usuNome;
	}
	
	public function getusuEmail(){
		return $this->usuEmail;
	}

	public function setusuEmail($usuEmail){
		$this->usuEmail = $usuEmail;
	}

	public function getusuSenha(){
		return $this->usuSenha;
	}

	public function setusuSenha($usuSenha){
		$this->usuSenha = $usuSenha;
	}

	public function getusuTipo(){
		return $this->usuTipo;
	}

	public function setusuTipo($usuTipo){
		$this->usuTipo = $usuTipo;
	}	
	
	public function __toString(){
		return
				"Id: ".$this->getusuId().
				"<br> Nome: ".$this->getusuNome().
				"<br> Email: ".$this->getusuEmail().
				"<br> Senha: ".$this->getusuSenha().
				"<br> Tipo: ".$this->getusuTipo();
	}
}
?>