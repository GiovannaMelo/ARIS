<?php
require_once 'Conexao.php';
class Declaracao
{
    private $codDeclaracao;
    private $dataDeclaracao;
    private $acompDeclaracao;
    private $horaEntradaDeclaracao;
    private $horaSaidaDeclaracao;
    private $codPaciente;
    private $codMedico;

//
//

    public function getCodDeclaracao(){
        return $this->codDeclaracao;
    }
    public function getDataDeclaracao(){
        return $this->dataDeclaracao;
    }
    public function getAcompDeclaracao(){
        return $this->acompDeclaracao;
    }
    public function getHoraEntradaDeclaracao(){
        return $this->horaEntradaDeclaracao;
    }
    public function getHoraSaidaDeclaracao(){
        return $this->horaSaidaDeclaracao;
    }
    public function getCodPaciente(){
        return $this->codPaciente;
    }
    public function getCodMedico(){
        return $this->codMedico;
    }
//
//
//
    public function setCodDeclaracao($codDeclaracao){
        $this->codDeclaracao = $codDeclaracao;
    }
    public function setDataDeclaracao($dataDeclaracao){
        $this->dataDeclaracao = $dataDeclaracao;
    }
    public function setAcompDeclaracao($acompDeclaracao){
        $this->acompDeclaracao = $acompDeclaracao;
    }
    public function setHoraEntradaDeclaracao($horaEntrada){
        $this->horaEntradaDeclaracao = $horaEntrada;
    }
    public function setHoraSaidaDeclaracao($horaSaida){
        $this->horaSaidaDeclaracao = $horaSaida;
    }
    public function setCodPaciente($codPaciente){
        $this->codPaciente = $codPaciente;
    }
    public function setCodMedico($codMedico){
        $this->codMedico = $codMedico;
    }

    public function cadastrarDeclaracao($Declaracao){
        $conexao = Conexao::pegarConexao();
        $queryInsert = "INSERT INTO tbDeclaracao 
        (codPaciente
        ,codMedico
        ,acompDeclaracao
        ,horaEntradaDeclaracao
        ,horaSaidaDeclaracao
        ,dataDeclaracao
        )
        VALUES 
        ('".$Declaracao->getCodPaciente()."'
        ,'".$Declaracao->getCodMedico()."'
        ,'".$Declaracao->getAcompDeclaracao()."'
        ,'".$Declaracao->getHoraEntradaDeclaracao()."'
        ,'".$Declaracao->getHoraSaidaDeclaracao()."'
        ,'".$Declaracao->getDataDeclaracao()."'
        )";
        $conexao->exec($queryInsert);
    }
}
?>