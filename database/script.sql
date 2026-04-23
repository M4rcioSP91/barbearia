CREATE DATABASE db_barbearia; -- cria banco de dados

-- criar tabela de serviços
CREATE TABLE tb_servicos (
    id int not null primary key AUTO_INCREMENT,
    descricao varchar (255) not null,
    valor_do_servico decimal(10,2) not null    
); 

-- criar tabela de clientes
CREATE TABLE tb_clientes (
    id int not null primary key AUTO_INCREMENT,
    nome varchar(255) not null,
    telefone varchar(15)
);

-- criar tabela de auxiliar para atendimento ON DELETE CASCADE evita dasdo otfaous e deleta os dados automaticamente
CREATE table tb_usuarios (
	id int not null PRIMARY KEY AUTO_INCREMENT,
    nome varchar(255) not null,
    sobrenome varchar(255),
    email varchar(255) not null UNIQUE,
    senha varchar(255) not null,
    telefone varchar(15),
    status ENUM('ativo','inativo') DEFAULT 'ativo',
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE table tb_funcionarios (
	id int not null PRIMARY KEY AUTO_INCREMENT,
    idUsuario int,
    Funcao varchar(100),
    telefone varchar(15),
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN key (idUsuario) REFERENCES tb_usuarios (id)
);

CREATE table tb_atendimento (
	id int not null PRIMARY KEY AUTO_INCREMENT,
    --idCliente int,ainda não foi criada a regra de negocio
    --idFuncionario int,ainda não foi criada a regra de negocio
    valorTotal decimal(10,2) not null,
    FOREIGN KEY (idCliente) REFERENCES tb_clientes (id),
    FOREIGN KEY (idFuncionario) REFERENCES tb_funcionarios (id),
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE table tb_atendimento_servico (
	id int not null PRIMARY KEY AUTO_INCREMENT,
    idAtendimento int not null,
    idServico int not null,
    valorHistorico decimal(10,2) not null,
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idAtendimento) REFERENCES tb_atendimento (id) ON DELETE CASCADE,
    FOREIGN KEY (idServico) REFERENCES tb_servicos (id)
);