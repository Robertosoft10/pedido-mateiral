<?php
require_once 'classConexao.php';
require_once  '../Modell/classCliente.php';

class ClienteDAO{
	public function __construct() {
		$conexao = new Conexao();
		$this->executar = $conexao->getConnection();
	}
    public function CadastrarCliente($cliente) {

    $sql = "INSERT INTO clientes (codCliente, cliente,  telefone, cpf, endereco, local) VALUES (null, ?, ?, ?, ?, ?) ";
		try {

			$objeto = $this->executar->prepare($sql);
			$objeto->bindValue(1, $cliente->getCliente(), PDO::PARAM_STR);
			$objeto->bindValue(2, $cliente->getTelefone(), PDO::PARAM_STR);
			$objeto->bindValue(3, $cliente->getCpf(), PDO::PARAM_STR);
		  $objeto->bindValue(4, $cliente->getEndereco(), PDO::PARAM_STR);
		  $objeto->bindValue(5, $cliente->getLocal(), PDO::PARAM_STR);

			$objeto->execute();
			$this->executar = NULL;
		} catch (PDOException $ex) {
			echo "Erro: " . $ex -> getMessage();
		}
	}
    public function ListarClientes() {
		$sql = "SELECT * FROM clientes";
		try {
			$objeto = $this->executar->prepare($sql);
			$objeto->execute();
            return $objeto;
			$this->executar = NULL;
		} catch (PDOException $ex) {
			echo "Erro: " . $ex -> getMessage();
		}
	}
	public function BuscarCliente($codCliente) {
	$sql = "SELECT * FROM clientes WHERE codCliente = ?";
	try {
		$objeto = $this->executar->prepare($sql);
					$objeto->bindValue(1, $codCliente, PDO::PARAM_STR);
		$objeto->execute();
					return $objeto;
		$this->executar = NULL;
	} catch (PDOException $ex) {
		echo "Erro: " . $ex -> getMessage();
	}
}

    public function AtualizarCliente($cliente) {
    $sql = "UPDATE clientes SET  cliente= ?, telefone= ?, cpf= ?, endereco=?, local= ? WHERE codCliente = ?";
		try {
			$objeto = $this->executar->prepare($sql);
			$objeto->bindValue(1, $cliente->getCliente(), PDO::PARAM_STR);
			$objeto->bindValue(2, $cliente->getTelefone(), PDO::PARAM_STR);
			$objeto->bindValue(3, $cliente->getCpf(), PDO::PARAM_STR);
		  $objeto->bindValue(4, $cliente->getEndereco(), PDO::PARAM_STR);
		  $objeto->bindValue(5, $cliente->getLocal(), PDO::PARAM_STR);
      $objeto->bindValue(6, $cliente->getCodCliente(), PDO::PARAM_INT);

			$objeto->execute();
			$this->executar = NULL;
		} catch (PDOException $ex) {
			echo "Erro: " . $ex -> getMessage();
		}
	}
    public function DeleteCliente($codCliente) {
    $sql = "DELETE FROM clientes WHERE codCliente = ?";
		try {
			$objeto = $this->executar->prepare($sql);
            $objeto->bindValue(1, $codCliente, PDO::PARAM_INT);
			$objeto->execute();
			$this->executar = NULL;
		} catch (PDOException $ex) {
			echo "Erro: " . $ex -> getMessage();
		}
	}
}

?>
