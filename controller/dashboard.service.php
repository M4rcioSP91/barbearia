<?php

class dashboardService {

    private $conexao;
    private $data;

    public function __construct(conexao $conexao, dashboard_as $data){
        $this->conexao = $conexao->conectar();
        $this->data = $data;
    }

    public function recuperarTotais() {

        if($this->data->__get('tipo') == 'admin') {

            $query = "
                SELECT 
                    u.id,
                    u.nome,

                    SUM(CASE WHEN DATE(a.criado_em) = CURDATE() THEN a.valorHistorico ELSE 0 END) as dia,

                    SUM(CASE WHEN YEARWEEK(a.criado_em,1) = YEARWEEK(CURDATE(),1) THEN a.valorHistorico ELSE 0 END) as semana,

                    SUM(CASE WHEN MONTH(a.criado_em) = MONTH(CURDATE()) 
                             AND YEAR(a.criado_em) = YEAR(CURDATE())
                             THEN a.valorHistorico ELSE 0 END) as mes,

                    SUM(CASE WHEN YEAR(a.criado_em) = YEAR(CURDATE()) THEN a.valorHistorico ELSE 0 END) as ano

                FROM tb_atendimento_servico a
                JOIN tb_usuarios u ON u.id = a.idUsuario
                GROUP BY u.id, u.nome
            ";

            $stmt = $this->conexao->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);

        } else {

            $query = "
                SELECT 
                    SUM(CASE WHEN DATE(criado_em) = CURDATE() THEN valorHistorico ELSE 0 END) as dia,
                    SUM(CASE WHEN YEARWEEK(criado_em,1) = YEARWEEK(CURDATE(),1) THEN valorHistorico ELSE 0 END) as semana,
                    SUM(CASE WHEN MONTH(criado_em) = MONTH(CURDATE()) 
                             AND YEAR(criado_em) = YEAR(CURDATE())
                             THEN valorHistorico ELSE 0 END) as mes,
                    SUM(CASE WHEN YEAR(criado_em) = YEAR(CURDATE()) THEN valorHistorico ELSE 0 END) as ano
                FROM tb_atendimento_servico
                WHERE idUsuario = :id
            ";

            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':id', $this->data->__get('usuario_id'));
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_OBJ);
        }
    }
}