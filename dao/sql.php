<?php
//criação da classe
	class Sql extends PDO{ 
		private $conn;
		
		//conexão com o banco de dados
		public function __construct(){
			$this->conn = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");
		}

		private function setParams($statement, $parameters = array()){
			foreach ($parameters as $key => $value){
				$this->setParam($statement, $key, $value);
			}
		}
		
		private function setParam($statement, $key, $value){
			$statement->bindParam($key, $value);
		}
		
	
		public function query($rawQuery, $params = array()){  
			$stmt = $this->conn->prepare($rawQuery); 
			$this->setParams($stmt, $params);
			$stmt->execute();
			return $stmt;
		}
		
		public function select($rawQuery, $params = array()){  
			$stmt = $this->query($rawQuery, $params);
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
	}
?>