<?php

//CRUD
class novoCadastroService{

private $conexao;
private $cadastro;

public function __construct(conexao $conexao,novoCadastro $cadastro){//recebe a conexaõ e o objeto serviço
    $this->conexao = $conexao->conectar();
    $this->cadastro = $cadastro;
    }
    public function inserir(){ // create
                                          //nome da coluna,nome da coluna    //valor, Valor passados por parametro para ser substituido depois
       try {

        $this->conexao->beginTransaction();

        if ($this->emailExiste($this->cadastro->__get('email'))) {
            throw new Exception('E-mail já cadastrado');
        }

        $query = 'INSERT INTO tb_usuarios
        (nome, sobrenome, email, senha, telefone, status, tipo, nomeEmpresa)
        VALUES (:nome, :sobrenome, :email, :senha, :telefone, 1, 1, :nomeEmpresa)';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':nome', $this->cadastro->__get('nome'), PDO::PARAM_STR);
        $stmt->bindValue(':sobrenome', $this->cadastro->__get('sobrenome'), PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->cadastro->__get('email'), PDO::PARAM_STR);
        $stmt->bindValue(':senha', $this->cadastro->__get('senha'), PDO::PARAM_STR);
        $stmt->bindValue(':telefone', $this->cadastro->__get('telefone'), PDO::PARAM_STR);
        $stmt->bindValue(':nomeEmpresa', $this->cadastro->__get('nomeEmpresa'), PDO::PARAM_STR);
        $stmt->execute();

        $usuario_id = $this->conexao->lastInsertId();

        $query2 = "INSERT INTO tb_funcionarios (idUsuario, Funcao)
                   VALUES (:usuario_id, :funcao)";

        $stmt2 = $this->conexao->prepare($query2);
        $stmt2->bindValue(':usuario_id', $usuario_id, PDO::PARAM_INT);
        $stmt2->bindValue(':funcao', $this->cadastro->__get('funcao') ?? 'SocioProprietario');
        $stmt2->execute();

        $this->conexao->commit();

        return $usuario_id;

    } catch (Exception $e) {

        $this->conexao->rollBack();
        throw $e;
    }

        
    }

    public function emailExiste($email) {

        $query = "SELECT COUNT(*) as total FROM tb_usuarios WHERE email = :email";

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_OBJ);

        return $resultado->total > 0;
        }

        
    public function recuperar(){ // read
        ;
    }
    public function atualizar(){ // update
     
        
    }
    public function remover(){ // delete

     
        
    }
}

?>