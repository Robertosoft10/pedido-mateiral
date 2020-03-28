<?php
require_once 'classConexao.php';
require_once  '../Modell/classProduto.php';

class ProdutoDAO{
	public function __construct() {
		$conexao = new Conexao();
		$this->executar = $conexao->getConnection();
	}
    public function CadastrarProduto($produto) {

		    $sql = "INSERT INTO produtos (codProduto, produto, codigo, preco, descricao) VALUES (null, ?, ?, ?, ?) ";
				try {
					$objeto = $this->executar->prepare($sql);
					$objeto->bindValue(1, $produto->getProduto(), PDO::PARAM_STR);
					$objeto->bindValue(2, $produto->getCodigo(), PDO::PARAM_STR);
					$objeto->bindValue(3, $produto->getPreco(), PDO::PARAM_STR);
					$objeto->bindValue(4, $produto->getDescricao(), PDO::PARAM_STR);

					$objeto->execute();
					$this->executar = NULL;
				} catch (PDOException $ex) {
					echo "Erro: " . $ex -> getMessage();
				}
			}
				public function ListarProdutos() {
				$sql = "SELECT * FROM produtos";
				try {
					$objeto = $this->executar->prepare($sql);
					$objeto->execute();
								return $objeto;
					$this->executar = NULL;
				} catch (PDOException $ex) {
					echo "Erro: " . $ex -> getMessage();
				}
			}
		public function BuscarProduto($codProduto) {
		$sql = "SELECT * FROM produtos WHERE codProduto = ?";
		try {
			$objeto = $this->executar->prepare($sql);
						$objeto->bindValue(1, $codProduto, PDO::PARAM_STR);
			$objeto->execute();
						return $objeto;
			$this->executar = NULL;
		} catch (PDOException $ex) {
			echo "Erro: " . $ex -> getMessage();
				}
			}
			    public function AtualizarProduto($produto) {
			    $sql = "UPDATE produtos SET  produto= ?, codigo= ?, preco= ?, descricao= ? WHERE codProduto = ?";
					try {
						$objeto = $this->executar->prepare($sql);
						$objeto->bindValue(1, $produto->getProduto(), PDO::PARAM_STR);
						$objeto->bindValue(2, $produto->getCodigo(), PDO::PARAM_STR);
						$objeto->bindValue(3, $produto->getPreco(), PDO::PARAM_STR);
						$objeto->bindValue(4, $produto->getDescricao(), PDO::PARAM_STR);
			      $objeto->bindValue(5, $produto->getCodProduto(), PDO::PARAM_INT);

						$objeto->execute();
						$this->executar = NULL;
					} catch (PDOException $ex) {
						echo "Erro: " . $ex -> getMessage();
					}
				}
			    public function DeleteProduto($codProduto) {
			    $sql = "DELETE FROM produtos WHERE codProduto = ?";
					try {
						$objeto = $this->executar->prepare($sql);
			            $objeto->bindValue(1, $codProduto, PDO::PARAM_INT);
						$objeto->execute();
						$this->executar = NULL;
					} catch (PDOException $ex) {
						echo "Erro: " . $ex -> getMessage();
					}
				}
			}
?>
