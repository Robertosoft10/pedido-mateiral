<?php
require_once 'classConexao.php';
require_once  '../Modell/classUsuario.php';

class UsuarioDAO{
	public function __construct() {
		$conexao = new Conexao();
		$this->executar = $conexao->getConnection();
	}
    public function CadastrarUsuario($usuario) {

    $sql = "INSERT INTO usuarios (codUsuario, usuario,  email, senha, tipo) VALUES (null, ?, ?, ?, ?) ";
		try {

			$objeto = $this->executar->prepare($sql);
			$objeto->bindValue(1, $usuario->getUsuario(), PDO::PARAM_STR);
			$objeto->bindValue(2, $usuario->getEmail(), PDO::PARAM_STR);
			$objeto->bindValue(3, $usuario->getSenha(), PDO::PARAM_STR);
		  $objeto->bindValue(4, $usuario->getTipo(), PDO::PARAM_STR);

			$objeto->execute();
			$this->executar = NULL;
		} catch (PDOException $ex) {
			echo "Erro: " . $ex -> getMessage();
		}
	}
    public function ListarUsuarios() {
		$sql = "SELECT * FROM usuarios";
		try {
			$objeto = $this->executar->prepare($sql);
			$objeto->execute();
            return $objeto;
			$this->executar = NULL;
		} catch (PDOException $ex) {
			echo "Erro: " . $ex -> getMessage();
		}
	}
	public function BuscarUsuario($codUsuario) {
	$sql = "SELECT * FROM usuarios WHERE codUsuario = ?";
	try {
		$objeto = $this->executar->prepare($sql);
					$objeto->bindValue(1, $codUsuario, PDO::PARAM_STR);
		$objeto->execute();
					return $objeto;
		$this->executar = NULL;
	} catch (PDOException $ex) {
		echo "Erro: " . $ex -> getMessage();
	}
}
    public function AtualizarUsuario($usuario) {
    $sql = "UPDATE usuarios SET  usuario= ?, email= ?, senha= ?, tipo=? WHERE codUsuario = ?";
		try {
			$objeto = $this->executar->prepare($sql);
			$objeto->bindValue(1, $usuario->getUsuario(), PDO::PARAM_STR);
			$objeto->bindValue(2, $usuario->getEmail(), PDO::PARAM_STR);
			$objeto->bindValue(3, $usuario->getSenha(), PDO::PARAM_STR);
		  $objeto->bindValue(4, $usuario->getTipo(), PDO::PARAM_STR);
      $objeto->bindValue(5, $usuario->getCodUsuario(), PDO::PARAM_INT);

			$objeto->execute();
			$this->executar = NULL;
		} catch (PDOException $ex) {
			echo "Erro: " . $ex -> getMessage();
		}
	}
    public function DeleteUsuario($codUsuario) {
    $sql = "DELETE FROM usuarios WHERE codUsuario = ?";
		try {
			$objeto = $this->executar->prepare($sql);
            $objeto->bindValue(1, $codUsuario, PDO::PARAM_INT);
			$objeto->execute();
			$this->executar = NULL;
		} catch (PDOException $ex) {
			echo "Erro: " . $ex -> getMessage();
		}
	}
}
?>
