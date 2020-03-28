<?php
class Produto{
    private $codProduto;
    private $produto;
    private $codigo;
    private $preco;
    private $descricao;

    public function __construct($codProduto=0, $produto="", $codigo="", $preco="", $descricao=""){
        $this->codProduto = $codProduto;
        $this->produto = $produto;
        $this->codigo = $codigo;
        $this->preco = $preco;
        $this->descricao = $descricao;
    }
    public function getCodProduto(){
        return $this->codProduto;
    }
    public function setCodProduto($codProduto){
        $this->codProduto = $codProduto;
    }
    public function getProduto(){
        return $this->produto;
    }
    public function setProduto($produto){
        $this->produto = $produto;
    }
    public function getCodigo(){
        return $this->codigo;
    }
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }
    public function getPreco(){
        return $this->preco;
    }
    public function setPreco($preco){
        $this->preco = $preco;
    }
    public function getDescricao(){
        return $this->descricao;
    }
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }
  }
?>
