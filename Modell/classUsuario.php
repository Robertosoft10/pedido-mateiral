<?php
class Usuario{
    private $codUsuario;
    private $usuario;
    private $email;
    private $senha;
    private $tipo;

    public function __construct($codUsuario=0, $usuario="", $email="", $senha="", $tipo="", $local=""){
        $this->codUsuario = $codUsuario;
        $this->usuario = $usuario;
        $this->email = $email;
        $this->senha = $senha;
        $this->tipo = $tipo;
    }
    public function getCodUsuario(){
        return $this->codUsuario;
    }
    public function setCodUsuario($codUsuario){
        $this->codUsuario = $codUsuario;
    }
     public function getUsuario(){
        return $this->usuario;
    }
    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }
    public function getEmail(){
       return $this->email;
   }
   public function setEmail($email){
       $this->email = $email;
   }
     public function getSenha(){
        return $this->senha;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function setTipo($tipo){
        $this->tipo = $tipo;
    }
}
?>
