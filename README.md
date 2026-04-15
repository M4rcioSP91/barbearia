# Projeto-Integrador-I---Univesp

- Sobre o Projeto:

Este projeto é uma aplicação web desenvolvida para auxiliar barbeiros e donos de barbearias no gerenciamento de seus serviços, clientes e controle financeiro.

A proposta é substituir anotações em cadernos físicos por um sistema digital, facilitando a organização, consulta e análise dos dados.

- Funcionalidades:

* Cadastro de clientes
* Cadastro de serviços
* Registro de atendimentos
* Listagem de serviços realizados
* Controle básico financeiro
* Interface simples e intuitiva
  
- Tecnologias Utilizadas:

  Front-end
HTML5
CSS3
* Bootstrap

  Back-end
* PHP

  Banco de Dados
* MySQL

  Servidor
* Apache (XAMPP)

  Estrutura do Projeto
barbearia/
│
├── /assets
│   ├── /css
│   ├── /img    
│   ├── /js
│
├── /models
├── /controllers
├── /services
├── /views
│
├── /config
│   └── conexao.php
│
└── script.sql

* Como Executar o Projeto*

1. Clone o repositório
git clone 

2. Coloque o projeto no servidor

Coloque a pasta dentro do diretório:
htdocs (caso use XAMPP)

3. Configure o banco de dados
Crie um banco no MySQL
Execute o arquivo:
script.sql

4. Configure a conexão

No arquivo config/conexao.php, altere:

$host = "localhost";
$dbname = "nome_do_banco";
$user = "root";
$password = "";

5. Execute no navegador
http://localhost/barbearia
