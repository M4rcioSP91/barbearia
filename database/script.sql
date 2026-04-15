CREATE DATABASE db_barbearia; // cria banco de dados

CREATE TABLE tb_servicos (
    id int not null primary key AUTO_INCREMENT,
    descricao varchar (255) not null,
    valor_do_servico decimal(10,2) not null    
); // criar tabela de serviços

CREATE TABLE tb_clientes (
    id int not null primary key AUTO_INCREMENT,
    nome varchar(255) not null,
    telefone varchar(15)
)