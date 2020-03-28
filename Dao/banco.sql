CREATE DATABASE entrega;
USE entrega;

CREATE TABLE usuarios(
  codUsuario int not null auto_increment primary key,
  usuario varchar(255),
  email varchar(255),
  senha varchar(255),
  tipo varchar(30)
);
CREATE TABLE clientes(
  codCliente int not null auto_increment primary key,
  cliente varchar(255),
  telefone varchar(20),
  cpf varchar(30),
  endereco varchar(500),
  descricao varchar(900)
);
CREATE TABLE produtos(
  codProduto int not null auto_increment primary key,
  produto varchar(255),
  codigo varchar(20),
  preco varchar(30),
  descricao varchar(900)
);
CREATE TABLE pedidos(
	codPedido int not null auto_increment primary key,
  codCliente int,
	codProduto int,
  qtdProduto varchar(100),
  somaValor  varchar(100),
	foreign key (codCliente) references clientes (codCliente),
  foreign key (codProduto) references produtos (codProduto)
);
