<?php


class dashboardService{

private $conexao;
private $data;

public function __construct(conexao $conexao,dashboard_as $data){//recebe a conexaõ e o objeto serviço
    $this->conexao = $conexao->conectar();
    $this->data = $data;
}
    
    
    public function recuperarDia(){ // read
        $query = 'SELECT sum(valorHistorico) as Total 
        FROM `tb_atendimento_servico` 
        WHERE DAY(criado_em) = DAY(CURRENT_DATE())  
        AND MONTH(criado_em) = MONTH(CURDATE())
        AND YEAR(criado_em) = YEAR(CURDATE())';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
        
    }

    public function recuperarSem(){ // read
        $query = 'SELECT sum(valorHistorico) as Total 
        FROM `tb_atendimento_servico` 
        WHERE YEARWEEK(criado_em, 1) = YEARWEEK(CURRENT_DATE(), 1)';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function recuperarMes(){ // read
        $query = 'SELECT sum(valorHistorico) as Total 
        FROM `tb_atendimento_servico` 
        WHERE MONTH(criado_em) = MONTH(CURRENT_DATE())
        AND YEAR(criado_em) = YEAR(CURDATE())';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function recuperarAno(){ // read
        $query = 'SELECT sum(valorHistorico) as Total 
        FROM `tb_atendimento_servico` 
        WHERE YEAR(criado_em) = YEAR(CURDATE())';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }

    //area do grafico

    public function faturamentoMes(){
        $query = 'SELECT MONTH(criado_em) as mes,SUM(valorHistorico) as total 
        FROM tb_atendimento_servico WHERE YEAR(criado_em) = YEAR(CURRENT_DATE())
        GROUP BY MONTH(criado_em) ORDER BY mes';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_OBJ);
    }

    public function servicosVendidos(){
        $query = 'SELECT a.descricao, COUNT(*) as total
        FROM tb_servicos a join tb_atendimento_servico b on a.id = b.idServico
        GROUP BY a.descricao';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

        
    
}