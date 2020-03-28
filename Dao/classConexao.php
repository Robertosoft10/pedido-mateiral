<?php
class Conexao {

	public $con = null;
	public $dbType = "mysql";
	public $host = "localhost";
	public $usuario = "root";
	public $senha = "";
	public $banco = "entrega";
	public $resultado = false;

	public function Conexao($resultado = false) {
		if ($resultado != false) {
			$this -> resultado = true;
		}
	}

	public function getConnection() {

		try {
			$this -> conexao = new PDO($this -> dbType . ":host=" . $this -> host . ";dbname=" . $this -> banco, $this -> usuario, $this -> senha,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			return $this -> conexao;

		} catch ( PDOException $ex ) {
			 echo "Erro: " . $ex -> getMessage();
		}

	}
	public function Close() {
		if ($this -> con != null)
			$this -> con = null;
	}

}
?>
